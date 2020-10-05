<?php

namespace App\helpers;
class Message
{

	private $session;
	private $message;
	public $notification;

	public function notifyError($error)
	{
		$this->notification['notify'][] = [
			'type' => "danger",
			'title' => $error,
		];
		return $this;
	}

	public function notifySuccess($text)
	{
		$this->notification['notify'][] = [
			'type' => "success",
			'title' => $text,
		];
		return $this;
	}

	public function notifyWarning($text)
	{
		$this->notification['notify'][] = [
			'type' => "warning",
			'title' => $text,
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
