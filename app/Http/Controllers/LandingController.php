<?php

namespace App\Http\Controllers;

use App\Http\Requests\GambarRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\UpdateGaleryRequest;
use App\Models\Galery;
use App\Models\landingPage;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $landingpage = LandingPage::find(1);
        $galerys = Galery::all();

        return view('landing/landing', compact('landingpage', 'galerys'));
    }

    public function detail()
    {
        return view('landing/detail_landing');
    }

    public function all()
    {
        return view('landing/lihat_semua_domba');
    }

    public function slider()
    {
        return view('pengaturan/slider');
    }

    public function galery()
    {
        $galerys = Galery::all();
        return view('pengaturan/galery', compact('galerys'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'required|image',
            'caption' => 'required',
            'deskripsi' => 'required',
        ]);

        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $watermark = Image::make(public_path('watermarks/watermark.png'))->resize(150, 150);
        $imageToWatermark = Image::make(public_path('images') . '/' . $imageName);

        $x = ($imageToWatermark->width() - $watermark->width()) / 2;
        $y = ($imageToWatermark->height() - $watermark->height()) / 2;

        $x = (int) $x;
        $y = (int) $y;

        $imageToWatermark->insert($watermark, 'top-left', $x, $y);
        $imageToWatermark->save(public_path('images') . '/' . $imageName);
        $validated['gambar'] = $imageName;
        Galery::create($validated);

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function updateimage(GambarRequest $request, $id)
    {
        $validated = $request->validated();
        $imageName = time() . '.' . $request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('images'), $imageName);
        $watermarkPath = public_path('watermarks/watermark.png');
        $image = Image::make(public_path('images/' . $imageName));


        $watermark = Image::make($watermarkPath)->resize(150, 150);

        $x = ($image->width() - $watermark->width()) / 2;
        $y = ($image->height() - $watermark->height()) / 2;

        $x = (int) $x;
        $y = (int) $y;

        $image->insert($watermark, 'top-left', $x, $y);
        $image->save(public_path('images/' . $imageName));
        $validated['gambar'] = $imageName;
        $galerys = Galery::find($id);
        $galerys->update($validated);

        return redirect()->back()->with('successedit', '');
    }

    public function update(UpdateGaleryRequest $request, $id)
    {
        $validated = $request->validated();
        $galerys = Galery::find($id);
        $galerys->update($validated);
        return redirect()->back()->with('success', 'Data Berhasil Di Update');
    }

    public function destroy($id)
    {
        $galerys = Galery::find($id);
        $galerys->delete();
        return redirect()->back()->with('successhapus', 'Data Berhasil Di Update');
    }

    public function landingpage()
    {
        $landingpage = LandingPage::all();

        return view('pengaturan/landing_page', compact('landingpage'));
    }

    public function UpdateLandingpage(Request $request, $id)
    {

        $validated = $request->validate([
            'judul_beranda' => 'required',
            'deskripsi_beranda' => 'required',
        ]);
        $data = LandingPage::find($id);
        $data->update($validated);

        return redirect()->back()->with('success', 'Data Berhasil Di Update');
    }

    public function tentangkami()
    {
        $landingpage = LandingPage::all();

        return view('pengaturan/tentang_kami', compact('landingpage'));
    }

    public function Updatetentangkami(Request $request, $id)
    {

        $validated = $request->validate([
            'deskripsi_tentangkami' => 'required',
        ]);
        $data = LandingPage::find($id);
        $data->update($validated);

        return redirect()->back()->with('success', 'Data Berhasil Di Update');
    }

    public function sosialmedia()
    {
        $landingpage = LandingPage::all();

        return view('pengaturan/sosial_media', compact('landingpage'));
    }

    public function Updatesosialmedia(Request $request, $id)
    {

        $validated = $request->validate([
            'instagram' => 'required',
            'tiktok' => 'required',
        ]);
        $data = LandingPage::find($id);
        $data->update($validated);

        return redirect()->back()->with('success', 'Data Berhasil Di Update');
    }

    public function footer()
    {
        $landingpage = LandingPage::all();

        return view('pengaturan/footer', compact('landingpage'));
    }

    public function Updatefooter(Request $request, $id)
    {

        $validated = $request->validate([
            'deskripsi_footer' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',
        ]);
        $data = LandingPage::find($id);
        $data->update($validated);

        return redirect()->back()->with('success', 'Data Berhasil Di Update');
    }
}
