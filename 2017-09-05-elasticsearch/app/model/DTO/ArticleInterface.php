<?php
/**
 * Created by PhpStorm.
 * User: Azathoth
 * Date: 2017-09-05
 * Time: 22:54
 */

namespace App\Model\DTO;

interface ArticleInterface {
	/**
	 * @return mixed
	 */
	public function getId();

	/**
	 * @return string
	 */
	public function getTitle(): string;

	/**
	 * @return string
	 */
	public function getText(): string;
}