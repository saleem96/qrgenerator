<?php

namespace App\Http\Controllers;

use App\QrDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as FacadeResponse;
class QrcodeController extends Controller
{
    public function active($status)
    {
        $user=auth()->user();
        $qr_detail=QrDetail::where('user_id',$user->id)
        ->when($status == "active",function($q) use($status){

            return $q->where('status',1);
        })

        ->when($status == "pause",function($q) use($status){

            return $q->where('status',0);
        })

        ->when($status == "expired",function($q) use($status){

            return $q->where('is_exp',1);
        })
        ->orderBy('id', 'DESC')->get();
        return view('codes.active',compact('qr_detail'));
    }

    public function destroy($id)
    {
     $code = QrDetail::find($id);
     $code->delete();
     return redirect('/active');
    }
    public function pause($id)
    {
     $code = QrDetail::find($id);
     $code->status=0;
     $code->save();
     return redirect('/pause');
    }
    public function start($id)
    {
     $code = QrDetail::find($id);
     $code->status=1;
     $code->save();
     return redirect('/active');
    }
    public function download($filename)
    {
          dd('ssss');
        $file= public_path('qrcdr/qrcodes/'.$filename);
      
      $headers=  header('Content-type: image/svg+xml');
// header('Content-Disposition: attachment; filename=image.svg');
        // return response()->download($file);
              return FacadeResponse::download($file, $headers);
    }
}
