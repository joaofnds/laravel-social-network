<?php

namespace App\Traits;

use App\Friendship;

trait Friendable
{
	public function add_friend($requested_id)
	{
		$friendship = Friendship::create([
			'requester' => $this->id,
			'requested' => $requested_id
		]);

		if ($friendship)
		{
			return response()->json($friendship, 200);
		}

		return response()->json('fail', 501);
	}

	public function accept_friend($requester)
	{
		$friendship = Friendship::where('requester', $requester)
						->where('requested', $this->id)
						->first();

		if ($friendship)
		{
			$friendship->update([
				'status' => 1
			]);

			return response()->json($friendship, 200);
		}

		return response()->json($friendship, 501);
	}

	public function friends()
	{
		$friends = array();

		$f1 = Friendship::where('status', 1)
						->where('requester', $this->id)
						->get();

		foreach($f1 as $friendship) {
			array_push($friends, \App\User::find($friendship->requested));
		}

		$f2 = Friendship::where('status', 1)
						->where('requested', $this->id)
						->get();

		foreach($f2 as $friendship) {
			array_push($friends, \App\User::find($friendship->requester));
		}

		return $friends;
	}
}