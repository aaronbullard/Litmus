<?php

interface AccountInterface
{
	function validateCredentials($account, $token);
}