<?php

namespace App\Http\Controllers;

use App\Repositories\BasicRepository\AnswerKeyRepository;
use Image;
use App\Repositories\BasicRepository\bubbleSheetImgRepository;
use App\Repositories\BasicRepository\ResultRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Repositories\BasicRepository\Result;

class ResultController extends Controller
{
    private ResultRepository $resultRepository;
    private AnswerKeyRepository $answerKeyRepository;
    private bubbleSheetImgRepository $bubbleSheetImgRepository;

    public function __construct(ResultRepository $resultRepository, bubbleSheetImgRepository $bubbleSheetImgRepository, AnswerKeyRepository $answerKeyRepository)
    {
        $this->resultRepository = $resultRepository;
        $this->bubbleSheetImgRepository = $bubbleSheetImgRepository;
        $this->answerKeyRepository = $answerKeyRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$a1=array( "A1" => "1","A2" => "2","A3" => "3","A4" => "4","A5" => "3","A6" => "4","A7" => "3","A8" => "2","A9" => "1","A10" => "2","A11" => "3","A12" => "4","A13" => "3","A14" => "2","A15" => "1","A16" => "2","A17" => "3","A18" => "4","A19" => "3","A20" => "2","A21" => "1","A22" => "2","A23" => "3","A24" => "4","A25" => "3","A26" => "2","A27" => "3","A28" => "4","A29" => "3","A30" => "2","A31" => "1","A32" => "2","A33" => "3","A34" => "4","A35" => "3","A36" => "2","A37" => "1","A38" => "2","A39" => "3","A40" => "4","A41" => "3","A42" => "2","A43" => "1","A44" => "2","A45" => "3","A46" => "4","A47" => "3","A48" => "2","A49" => "1","A50" => "2");
        $a2=array( "A1" => "0","A2" => "2","A3" => "3","A4" => "4","A5" => "3","A6" => "4","A7" => "3","A8" => "2","A9" => "1","A10" => "2","A11" => "3","A12" => "4","A31" => "1","A32" => "2","A33" => "3","A34" => "4","A35" => "3","A36" => "2","A37" => "1","A38" => "2","A39" => "3","A40" => "4","A41" => "3","A42" => "2","A43" => "1","A44" => "2","A45" => "3","A46" => "4","A47" => "3","A48" => "2","A49" => "1","A50" => "2");
        $result=array_diff_assoc($a1,$a2);
        echo count($result);
        echo count($a2);
*/
    }

    public function storeImg(Request $request)
    {
        $this->validate($request, [

            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        for ($x = 0; $x < $request->TotalFiles; $x++) {

            if ($request->hasFile('files' . $x)) {
                $image = $request->file('files' . $x);


                $imageName = time() . '.' . $image->extension();



                $destinationPathThumbnail = public_path('/images/bubbleSheet');

                $img = Image::make($image->path());

                $img->resize(2480, 3508, function ($constraint) {

                    $constraint->aspectRatio();

                })->save($destinationPathThumbnail . '/' . $imageName);


                $destinationPath = public_path('/thumbnail');

                $image->move($destinationPath, $imageName);
            }
        }


       /* $validatedData = $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:png,jpg'
        ]);

        $ansKeyId = $request->ansKeyId;
        if ($request->TotalFiles > 0) {

            for ($x = 0; $x < $request->TotalFiles; $x++) {

                if ($request->hasFile('files' . $x)) {
                    $file = $request->file('files' . $x);


                    $path = $file->store('/images/bubbleSheet', ['disk' => 'BubbleSheetPath']);
                    $name = $file->getClientOriginalName();
                    $insert[$x]['answerkey_id'] = $ansKeyId;
                    $insert[$x]['name'] = $name;
                    $insert[$x]['path'] = $path;
                    $insert[$x]['status'] = 0;
                }
            }
            bubbleSheetImg::insert($insert);

            return response()->json(['success' => 'Ajax Multiple fIle has been uploaded']);
        } else {
            return response()->json(["message" => "Please try again."]);
        }*/
    }

    /**
     * compile Result from Image.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function compileResult(Request $request)
    {
        $ansKeyId=$request->ansKeyId;
        $class_id=$request->class_id;
        $groups_id=$request->groups_id;
        $session_id=$request->session_id;
        $answer=$this->answerKeyRepository->showAnswer($ansKeyId);
        $a1=json_decode($answer->answer, true);
        $bubbleSheetImg=$this->bubbleSheetImgRepository->show($ansKeyId);

        foreach ($bubbleSheetImg as $value)
        {
            $imgPath=$value->path;
            $name = basename($imgPath);
            $response = Http::get('http://3.208.9.7/omr-script/omr.php?image='.$name);
            $res=json_decode($response->body(), true);
            if($res['status']==200){
                $a2=$res['answer'];
                $rollNo=$res['rollNo'];
                $result=array_diff_assoc($a1,$a2);
                $countR=count($result);
                $countTQ=count($a1);
                $finalResult=$countTQ-$countR;

                $insert['answerKey_id'] = $ansKeyId;
                $insert['roll_no'] = $rollNo;
                $insert['class_id'] = $class_id;
                $insert['session_id'] = $groups_id;
                $insert['total_mark'] = $finalResult;
                $insert['attempt_question'] = $countR;
                $insert['total_question'] = $countTQ;
                Result::insert($insert);
            }
        }
    }
}
