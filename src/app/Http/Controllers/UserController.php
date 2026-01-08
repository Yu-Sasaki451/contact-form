<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;

class UserController extends Controller
{
    public function showAdmin(Request $request)
    {
        $categories = Category::all();

        $isSearch = $request->query('search') === '1';

        if ($isSearch) {
            $keyword = (string) $request->query('keyword', '');
            $gender = (string) $request->query('gender', '');
            $category_id = (string) $request->query('category_id', '');
            $date = (string) $request->query('date', '');

            session([
                'admin_search' => [
                    'keyword' => $keyword,
                    'gender' => $gender,
                    'category_id' => $category_id,
                    'date' => $date,
                ],
            ]);
        } else {
            $saved = session('admin_search', []);
            $keyword = (string) ($saved['keyword'] ?? '');
            $gender = (string) ($saved['gender'] ?? '');
            $category_id = (string) ($saved['category_id'] ?? '');
            $date = (string) ($saved['date'] ?? '');
        }

        $contactsQuery = Contact::with('category')->latest();

        if ($keyword !== '') {
            $kw = trim($keyword);
            $kwNormalized = preg_replace('/\s+/u', ' ', $kw);
            $tokens = preg_split('/\s+/u', $kwNormalized) ?: [];

            $contactsQuery->where(function ($q) use ($kwNormalized, $tokens) {
                $q->where('email', 'like', "%{$kwNormalized}%")
                    ->orWhere('first_name', 'like', "%{$kwNormalized}%")
                    ->orWhere('last_name', 'like', "%{$kwNormalized}%")
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$kwNormalized}%"])
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$kwNormalized}%"])
                    ->orWhereRaw("CONCAT(first_name, last_name) LIKE ?", ["%{$kwNormalized}%"])
                    ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$kwNormalized}%"]);

                if (count($tokens) >= 2) {
                    foreach ($tokens as $t) {
                        $q->where(function ($qq) use ($t) {
                            $qq->where('first_name', 'like', "%{$t}%")
                                ->orWhere('last_name', 'like', "%{$t}%");
                        });
                    }
                }
            });
        }

        if (in_array($gender, ['1', '2', '3'], true)) {
            $contactsQuery->where('gender', $gender);
        }

        if ($category_id !== '') {
            $contactsQuery->where('category_id', $category_id);
        }

        if ($date !== '') {
            $contactsQuery->whereDate('created_at', $date);
        }

        $contacts = $contactsQuery
            ->paginate(7)
            ->appends([
                'search' => '1',
                'keyword' => $keyword,
                'gender' => $gender,
                'category_id' => $category_id,
                'date' => $date,
            ]);

        return view('admin', compact('contacts', 'categories', 'category_id', 'gender', 'date', 'keyword'));
    }

    public function resetAdmin()
    {
        session()->forget('admin_search');
        return redirect('/admin');
    }

    public function export()
    {
        $saved = session('admin_search', []);
        $keyword = (string) ($saved['keyword'] ?? '');
        $gender = (string) ($saved['gender'] ?? '');
        $category_id = (string) ($saved['category_id'] ?? '');
        $date = (string) ($saved['date'] ?? '');

        $contactsQuery = Contact::with('category')->latest();

        if ($keyword !== '') {
            $kw = trim($keyword);
            $kwNormalized = preg_replace('/\s+/u', ' ', $kw);
            $tokens = preg_split('/\s+/u', $kwNormalized) ?: [];

            $contactsQuery->where(function ($q) use ($kwNormalized, $tokens) {
                $q->where('email', 'like', "%{$kwNormalized}%")
                    ->orWhere('first_name', 'like', "%{$kwNormalized}%")
                    ->orWhere('last_name', 'like', "%{$kwNormalized}%")
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$kwNormalized}%"])
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$kwNormalized}%"])
                    ->orWhereRaw("CONCAT(first_name, last_name) LIKE ?", ["%{$kwNormalized}%"])
                    ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$kwNormalized}%"]);

                if (count($tokens) >= 2) {
                    foreach ($tokens as $t) {
                        $q->where(function ($qq) use ($t) {
                            $qq->where('first_name', 'like', "%{$t}%")
                                ->orWhere('last_name', 'like', "%{$t}%");
                        });
                    }
                }
            });
        }

        if (in_array($gender, ['1', '2', '3'], true)) {
            $contactsQuery->where('gender', $gender);
        }

        if ($category_id !== '') {
            $contactsQuery->where('category_id', $category_id);
        }

        if ($date !== '') {
            $contactsQuery->whereDate('created_at', $date);
        }

        $contacts = $contactsQuery->get();

        $genderLabels = [1 => '男性', 2 => '女性', 3 => 'その他'];
        $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';

        return response()->streamDownload(function () use ($contacts, $genderLabels) {
            $out = fopen('php://output', 'w');

            fwrite($out, "\xEF\xBB\xBF");

            fputcsv($out, [
                'ID',
                'お名前',
                '性別',
                'メールアドレス',
                '電話番号',
                '住所',
                '建物名',
                'お問い合わせの種類',
                'お問い合わせ内容',
                '作成日',
            ]);

            foreach ($contacts as $contact) {
                fputcsv($out, [
                    $contact->id,
                    trim(($contact->last_name ?? '') . ' ' . ($contact->first_name ?? '')),
                    $genderLabels[(int) $contact->gender] ?? '',
                    $contact->email ?? '',
                    $contact->tel ?? '',
                    $contact->address ?? '',
                    $contact->building ?? '',
                    $contact->category->content ?? '',
                    $contact->detail ?? '',
                    optional($contact->created_at)->format('Y-m-d') ?? '',
                ]);
            }

            fclose($out);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
