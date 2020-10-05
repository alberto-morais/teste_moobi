<?php

namespace App\helpers;
class Message
{

	private $session;
	private $message;
	public $notification;

	public function notifyErrror($error)
	{
		$this->notification['notify'][] = [
			'type' => "error",
			'title' => "<span class='fa fa-times'></span>  $error",
		];
		return $this;
	}

	public function notifySuccess($text)
	{
		$this->notification['notify'][] = [
			'type' => "success",
			'title' => "<span class='fa fa-times'></span>  $text",
		];
		return $this;
	}

	public function notifyUpdate($text)
	{
		$this->notification['notify'][] = [
			'type' => "info",
			'title' => "<span class='fa fa-times'></span>  $text",
		];
		return $this;
	}


	public function notify($msg,$type)
	{
		$this->notification['notify'][] = [
			'type' => $type,
			'title' => $msg,
		];
		return $this;
	}

	public function json()
	{
		if(!empty($this->message)){
			echo json_encode($this->message);
		}
		if(!empty($this->notification)){
			echo json_encode($this->notification);
		}
	}

}
