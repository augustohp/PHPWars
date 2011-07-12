<?php
namespace PHPwars\Content;

interface Contenteable
{
	public function canMoveHere();
	public function hasTargetHere();
}