<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * ContactController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        return $user->contacts()->paginate(10);
    }
}
