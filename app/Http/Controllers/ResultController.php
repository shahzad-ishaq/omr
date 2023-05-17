<?php

namespace App\Http\Controllers;

use App\Repositories\BasicRepository\bubbleSheetImg;
use App\Repositories\BasicRepository\bubbleSheetImgRepository;
use App\Repositories\BasicRepository\ResultRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResultController extends Controller
{
    private ResultRepository $resultRepository;
    private bubbleSheetImgRepository $bubbleSheetImgRepository;
    public function __construct(ResultRepository $resultRepository,bubbleSheetImgRepository $bubbleSheetImgRepository){
        $this->resultRepository=$resultRepository;
        $this->bubbleSheetImgRepository=$bubbleSheetImgRepository;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeImg(Request $request)
    {
        $validatedData = $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:png,jpg'
        ]);

        $ansKeyId=$request->ansKeyId;
        if($request->TotalFiles > 0)
        {

            for ($x = 0; $x < $request->TotalFiles; $x++)
            {

                if ($request->hasFile('files'.$x))
                {
                    $file      = $request->file('files'.$x);


                     $path = $file->store('/images/bubbleSheet', ['disk' =>   'BubbleSheetPath']);
                    $name = $file->getClientOriginalName();

                    $insert[$x]['answerkey_id'] = $ansKeyId;
                    $insert[$x]['name'] = $name;
                    $insert[$x]['path'] = $path;
                    $insert[$x]['status'] = 0;
                }
            }
           /// dd($insert);
            bubbleSheetImg::insert($insert);

            return response()->json(['success'=>'Ajax Multiple fIle has been uploaded']);


        }
        else
        {
            return response()->json(["message" => "Please try again."]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function compileResult(Request $request)
    {
        $ansKeyId=$request->ansKeyId;
        $response = Http::get('google.com/');
        ///$response = Http::post('google.com/');
        dd($response);
    }
}
