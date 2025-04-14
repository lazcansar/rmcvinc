<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\Social;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminPage extends Controller
{
    public function index() {
        return view('admin.index');
    }
    // Contact Page
    public function contact(Request $request){
        $contact = Contact::firstOrNew();

        if ($request->isMethod('get')) {
            return view('admin.contact', compact('contact'));
        }
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
               'address' => 'nullable|string',
               'phone' => 'nullable|string',
               'whatsapp' => 'nullable|string',
               'email' => 'nullable|email',
            ]);
            $contact->fill($validatedData);
            $contact->save();
            return redirect()->route('admin.contact')->with('success', 'İletişim bilgileri güncellendi.');
        }
    }

    // Social Media
    public function social(Request $request){
        if ($request->isMethod('get')) {
            $social = Social::all();
            return view('admin.social', compact('social'));
        }
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => 'nullable|string',
                'url' => 'nullable|string',
            ]);
            $social = new Social();
            $social->fill($validatedData);
            $social->save();
            return redirect()->route('admin.social')->with('success', 'Sosyal medya bilgileri başarıyla eklendi.');
        }
    }
    public function socialDelete($id){
        $social = Social::find($id);
        $social->delete();
        return redirect()->route('admin.social')->with('success', 'Sosyal medya bilgileri silindi.');

    }

    // Gallery Page
    public function gallery(Request $request) {
        if ($request->isMethod('get')) {
            $images = Storage::disk('public')->files('images/gallery');
            return view('admin.gallery', ['images' => $images]);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'image_path' => 'required|array',
                'image_path.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasfile('image_path')) {
                $uploadFiles = [];
                foreach ($request->file('image_path') as $file) {
                    $imageName = time() . '.' . $file->getClientOriginalExtension();
                    $disk = 'public';
                    $imagePath = $file->storeAs('images/gallery', $imageName, 'public');
                }
                return redirect()->back()->with('success', 'Resimler başarıyla yüklendi.');
            }
            return redirect()->back()->with('success', 'Dosya yüklenirken hata oluştu!');
        }
    }

    public function galleryDelete($imagename){
        $safeImageName = basename($imagename);
        $filePath = 'images/gallery/' . $safeImageName;
        Storage::disk('public')->delete($filePath);
        return redirect()->back()->with('success', 'Resim başarılı şekilde silindi.');
    }

    // Services Page
    public function services(Request $request) {
        if ($request->isMethod('get')) {
            $services = Services::all();
            $serviceFind = null;
            return view('admin.services', compact('services', 'serviceFind'));
        }
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'slug' => 'required|unique:services,slug|lowercase',
                'meta_description' => 'nullable|string',
            ],
                [
                    'title.required' => 'Başlık girilmesi zorunludur.',
                    'slug.required' => 'İçerik girilmesi zorunludur',
                    'slug.lowercase' => 'Slug verisinin küçük harfler ile yazılması zorunludur.',
                    'image_path.required' => 'Resim dosyası seçimi zorunludur.',
                    'image_path.image' => 'Geçersiz resim dosyası',
                    'image_path.mimes' => 'Resim dosyası türü jpeg, png, jpg, gif veya svg olmalıdır.',
                    'image_path.max' => 'Resim dosyası boyutu en fazla 2MB olabilir.',
                    'description.required' => 'Metin alanının doldurulması zorunludur!',
                ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $services = new Services();

            $services->title = $request->title;
            $services->slug = $request->slug;
            $services->description = $request->description;
            $services->meta_description = $request->meta_description;

            if ($request->hasfile('image_path')) {
                $image = $request->file('image_path');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $disk = 'public';
                $imagePath = $image->storeAs('images/services', $imageName, 'public');
                $services->image_path = $imagePath;
            }
            $saved = $services->save();
        }
        if ($saved) {
            return redirect()->back()->with('success', 'Kayıt başarıyla yapıldı.');
        } else {
            return redirect()->back()->with('success', 'Kayıt yapılırken hata meydana geldi.');
        }
    }

    public function serviceUpdate(Request $request, $id){
        if ($request->isMethod('get')) {
            $services = Services::all();
            $serviceFind = Services::findOrFail($id);
            return view('admin.services', compact('serviceFind', 'services'));
        }
        if ($request->isMethod('post')) {
            $serviceFind = Services::findOrFail($id);
            $validate = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'slug' => [
                    'required',
                    'string',
                    Rule::unique('services', 'slug')->ignore($serviceFind->id),
                ],
                'meta_description' => 'nullable|string',
            ], [
                'title.required' => 'Başlık girilmesi zorunludur.',
                'slug.required' => 'İçerik girilmesi zorunludur',
                'slug.lowercase' => 'Slug verisinin küçük harfler ile yazılması zorunludur.',
                'image_path.image' => 'Geçersiz resim dosyası',
                'image_path.mimes' => 'Resim dosyası türü jpeg, png, jpg, gif veya svg olmalıdır.',
                'image_path.max' => 'Resim dosyası boyutu en fazla 2MB olabilir.',
                'description.required' => 'Metin alanının doldurulması zorunludur!',
            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate)->withInput();
            }

            $validatedData = $validate->validated();

            $serviceFind->title = $request->title;
            $serviceFind->slug = $validatedData['slug'];
            $serviceFind->description = $request->description;
            $serviceFind->meta_description = $request->meta_description;

            if ($request->hasfile('image_path')) {
                if ($serviceFind->image_path) {
                    Storage::disk('public')->delete($serviceFind->image_path);
                }

                $image = $request->file('image_path');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $disk = 'public';
                $imagePath = $image->storeAs('images/services', $imageName, 'public');
                $serviceFind->image_path = $imagePath;
            }
            $updated = $serviceFind->update();
        }
        if ($updated) {
            return redirect()->back()->with('success', 'Kayıt başarıyla güncellendi.');
        } else {
            return redirect()->back()->with('success', 'Kayıt güncellenirken hata oluştu!');
        }
    }

    public function serviceDelete($id){
        $service = Services::findOrFail($id);

        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);

            $deleted = $service->delete();
        }
        if ($deleted) {
            return redirect()->route('admin.blog')->with('success', 'Kayıt başarıyla silindi.');
        } else {
            return redirect()->back()->with('success', 'Kayıt silinirken hata oluştu.');
        }
    }


    // Blog Page
    public function blog(Request $request) {
        if ($request->isMethod('get')) {
            $services = Blog::all();
            $serviceFind = null;
            return view('admin.blog', compact('services', 'serviceFind'));
        }
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'slug' => 'required|unique:services,slug|lowercase',
                'meta_description' => 'nullable|string',
            ],
                [
                    'title.required' => 'Başlık girilmesi zorunludur.',
                    'slug.required' => 'İçerik girilmesi zorunludur',
                    'slug.lowercase' => 'Slug verisinin küçük harfler ile yazılması zorunludur.',
                    'image_path.required' => 'Resim dosyası seçimi zorunludur.',
                    'image_path.image' => 'Geçersiz resim dosyası',
                    'image_path.mimes' => 'Resim dosyası türü jpeg, png, jpg, gif veya svg olmalıdır.',
                    'image_path.max' => 'Resim dosyası boyutu en fazla 2MB olabilir.',
                    'description.required' => 'Metin alanının doldurulması zorunludur!',
                ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $services = new Blog();

            $services->title = $request->title;
            $services->slug = $request->slug;
            $services->description = $request->description;
            $services->meta_description = $request->meta_description;

            if ($request->hasfile('image_path')) {
                $image = $request->file('image_path');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $disk = 'public';
                $imagePath = $image->storeAs('images/article', $imageName, 'public');
                $services->image_path = $imagePath;
            }
            $saved = $services->save();
        }
        if ($saved) {
            return redirect()->back()->with('success', 'Kayıt başarıyla yapıldı.');
        } else {
            return redirect()->back()->with('success', 'Kayıt yapılırken hata meydana geldi.');
        }
    }

    public function blogUpdate(Request $request, $id){
        if ($request->isMethod('get')) {
            $services = Blog::all();
            $serviceFind = Blog::findOrFail($id);
            return view('admin.blog', compact('serviceFind', 'services'));
        }
        if ($request->isMethod('post')) {
            $serviceFind = Blog::findOrFail($id);
            $validate = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'slug' => [
                    'required',
                    'string',
                    Rule::unique('services', 'slug')->ignore($serviceFind->id),
                ],
                'meta_description' => 'nullable|string',
            ], [
                'title.required' => 'Başlık girilmesi zorunludur.',
                'slug.required' => 'İçerik girilmesi zorunludur',
                'slug.lowercase' => 'Slug verisinin küçük harfler ile yazılması zorunludur.',
                'image_path.image' => 'Geçersiz resim dosyası',
                'image_path.mimes' => 'Resim dosyası türü jpeg, png, jpg, gif veya svg olmalıdır.',
                'image_path.max' => 'Resim dosyası boyutu en fazla 2MB olabilir.',
                'description.required' => 'Metin alanının doldurulması zorunludur!',
            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate)->withInput();
            }

            $validatedData = $validate->validated();

            $serviceFind->title = $request->title;
            $serviceFind->slug = $validatedData['slug'];
            $serviceFind->description = $request->description;
            $serviceFind->meta_description = $request->meta_description;

            if ($request->hasfile('image_path')) {
                if ($serviceFind->image_path) {
                    Storage::disk('public')->delete($serviceFind->image_path);
                }

                $image = $request->file('image_path');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $disk = 'public';
                $imagePath = $image->storeAs('images/article', $imageName, 'public');
                $serviceFind->image_path = $imagePath;
            }
            $updated = $serviceFind->update();
        }
        if ($updated) {
            return redirect()->back()->with('success', 'Kayıt başarıyla güncellendi.');
        } else {
            return redirect()->back()->with('success', 'Kayıt güncellenirken hata oluştu!');
        }
    }

    public function blogDelete($id){
        $service = Blog::findOrFail($id);

        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);

            $deleted = $service->delete();
        }
        if ($deleted) {
            return redirect()->route('admin.blog')->with('success', 'Kayıt başarıyla silindi.');
        } else {
            return redirect()->back()->with('success', 'Kayıt silinirken hata oluştu.');
        }
    }



}
