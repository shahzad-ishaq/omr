<?php

namespace App\Http\Controllers;

use App\Repositories\BasicRepository\AnswerKey;
use App\Repositories\BasicRepository\AnswerKeyRepository;
use App\Repositories\BasicRepository\bubbleSheetImgRepository;
use Illuminate\Http\Request;

class AnswerKeyController extends Controller
{
    private AnswerKeyRepository $answerKeyRepository;
    private bubbleSheetImgRepository $bubbleSheetImgRepository;
    public function __construct(AnswerKeyRepository $answerKeyRepository,bubbleSheetImgRepository $bubbleSheetImgRepository){
           $this->answerKeyRepository=$answerKeyRepository;
        $this->bubbleSheetImgRepository=$bubbleSheetImgRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $ansKey=array();
        for($i=1;$i<=100;$i++){
            $variab="A".$i;
            if(isset($request->$variab)) {
                $ansKey[$variab] = $request->$variab;
            }
        }

        $ansKey = json_encode($ansKey);
        $data['institute_id']=$request->institute_id;
        $data['class_id']=$request->class_id;
        $data['session_id']=$request->session_id;
        $data['class_groups_id']=$request->class_groups_id;
        $data['subject_id']=$request->subject_id;
        $data['test_id']=$request->test_id;
        $data['answer']=$ansKey;
        $result=AnswerKey::create($data);
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $this->answerKeyRepository->show($request);
        //// json_decode($result);
    }
 public function showImg(Request $request)
    {
        $data = $this->answerKeyRepository->show($request);
        $result['ansKeyId']=$data->id;
        $result['imgPath'] = $this->bubbleSheetImgRepository->show($data->id);
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
