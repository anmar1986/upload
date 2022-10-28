<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('pages.home');
    }
    public function getContact()
    {
        return view('pages.home');
    }
    public function saveContact(Request $request)
    {

        $this->validate($request, [
        'filmtitle' => 'required',
        'filmmaker' => 'required',
        'yourage' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'plz' => 'required',
        'ort' => 'required',
        'land' => 'required',
        'telefon' => 'required',
        'email' => 'required|email',
        'filmlength' => 'required',
        'productindate' => 'required',
        'filmexplaining' => 'required',
        'whoareyou' => 'required',
        'didyougethelp' => 'required',
        'nextproject' => 'required',
        'anymoreinfo' => 'required',

        'signature'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'newsletter' => 'required',
        'termsandconditions' => 'required',
        ]);

// Here Start The Signature Photo Storage //
        $path = env('UPLOAD_DIR') . '/';
        $timestamp = hrtime(true);
        $newpath = $path . $timestamp;
        if (!Storage::disk('local')->has($newpath)) {
            Storage::disk('local')->makeDirectory($newpath);
        }
        if ($request->hasFile('signature')) {
            $file = $request->file('signature');
            $ext = $file->getClientOriginalExtension();
            $filename = 'signature.' . $ext;
            $file->storeAs($newpath, $filename);
        }
// Here End The Signature Photo Storage //
        $contact = new Contact;

        $contact->filmtitle = $request->filmtitle;
        $contact->filmmaker = $request->filmmaker;
        $contact->yourage = $request->yourage;
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->address = $request->address;
        $contact->plz = $request->plz;
        $contact->ort = $request->ort;
        $contact->land = $request->land;
        $contact->telefon = $request->telefon;
        $contact->email = $request->email;
        $contact->filmlength = $request->filmlength;
        $contact->productindate = $request->productindate;
        $contact->filmexplaining = $request->filmexplaining;
        $contact->whoareyou = $request->whoareyou;
        $contact->didyougethelp = $request->didyougethelp;
        $contact->nextproject = $request->nextproject;
        $contact->anymoreinfo = $request->anymoreinfo;
        $contact->filesavepath = $timestamp;
        $contact->newsletter = $request->newsletter;
        $contact->termsandconditions = $request->termsandconditions;

        $contact->save();

       \Mail::send('pages.contact_email',
            array(
                'filmtitle' => $request->get('filmtitle'),
                'filmmaker' => $request->get('filmmaker'),
                'yourage' => $request->get('yourage'),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'address' => $request->get('address'),
                'plz' => $request->get('plz'),
                'ort' => $request->get('ort'),
                'land' => $request->get('land'),
                'telefon' => $request->get('telefon'),
                'email' => $request->get('email'),
                'filmlength' => $request->get('filmlength'),
                'productindate' => $request->get('productindate'),
                'filmexplaining' => $request->get('filmexplaining'),
                'whoareyou' => $request->get('whoareyou'),
                'didyougethelp' => $request->get('didyougethelp'),
                'nextproject' => $request->get('nextproject'),
                'anymoreinfo' => $request->get('anymoreinfo'),
                'signature' => $request->get('signature'),
                'newsletter' => $request->get('newsletter'),
                'termsandconditions' => $request->get('termsandconditions'),
            ), function ($message) use ($request) {
                $message->from($request->email);
                $message->to('test@gmail.com');
            });

        return back()->with('success', 'Thank you for contact us!');

    }

    public function uploadtoserver() 
    {
        		// 5 minutes execution time
		@set_time_limit(5 * 60);
		// Uncomment this one to fake upload time
		// usleep(5000);

		// Settings
		$targetDir = storage_path().'/uploads';
		//$targetDir = 'uploads';
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds


		// Create target dir
		if (!file_exists($targetDir)) {
			@mkdir($targetDir);
		}

		// Get a file name
		if (isset($_REQUEST["name"])) {
			$fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid("file_");
		}

		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

		// Chunking might be enabled
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


		// Remove old temp files	
		if ($cleanupTargetDir) {
			if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}

			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}.part") {
					continue;
				}

				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}	


		// Open temp file
		if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}

		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			}

			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		} else {	
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		}

		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}

		@fclose($out);
		@fclose($in);

		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off 
			rename("{$filePath}.part", $filePath);
		}

		// Return Success JSON-RPC response
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

    }
    public function impressum()
    {
        return view('pages.impressum');
    }
}
