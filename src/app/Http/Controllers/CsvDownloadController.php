<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;
class CsvDownloadController extends Controller
{
        public function downloadCsv(Request $request){

            if($request->query() !== ''){
                $contacts = Contact::with('category')->KeywordSearch($request->query('keyword'))->GenderSearch($request->query('gender'))->CategorySearch($request->query('category_id'))->CreatedSearch($request->query('created_at'))->get()->toArray();
            }else{
                $contacts = Contact::with('category')->get()->toArray();
            }

            $head = ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類'];

            $f = fopen('test.csv', 'w');
            if ($f) {
                mb_convert_variables('SJIS', 'UTF-8', $head);
                fputcsv($f, $head);

                foreach ($contacts as $data) {
                        if($data['gender'] == '1'){
                            $gender = '男性';
                        }else if($data['gender'] == '2'){
                            $gender = '女性';
                        }else if($data['gender'] == '3'){
                            $gender = 'その他';
                        };

                    $contact = [
                        $data['last_name'] .'　' . $data['first_name'],
                        $gender,
                        $data['email'],
                        $data['category']['content']
                    ];
                    mb_convert_variables('SJIS', 'UTF-8', $contact);
                    fputcsv($f, $contact);
                }
            }
            fclose($f);

            header("Content-Type: application/octet-stream");
            header('Content-Length: '.filesize('test.csv'));
            header('Content-Disposition: attachment; filename=test.csv');
            readfile('test.csv');

            return view('user.index', compact('users'));
        }
}
