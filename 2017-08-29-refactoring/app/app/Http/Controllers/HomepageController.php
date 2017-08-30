<?php

namespace App\Http\Controllers;

use App\UsersRepository;
use Illuminate\View\View;



final class HomepageController extends Controller
{

	/**
	 * @var UsersRepository
	 */
	private $users;



	public function __construct(UsersRepository $users)
	{
		parent::__construct();

		$this->users = $users;
	}



	public function index(): View
	{
		return view('welcome', [
			'users' => $this->users->listOfActiveAdmins()
		]);
	}
}
