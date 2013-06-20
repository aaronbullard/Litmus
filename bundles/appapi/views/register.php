<?php

echo Form::open('api/register', 'POST');

echo Form::text('email', 'example@gmail.com');

echo Form::text('fname', 'First Name');

echo Form::text('lname', 'Last Name');

echo Form::text('street', 'Street Address');

echo Form::text('city', 'City');

echo Form::text('state', 'State');

echo Form::text('zipcode', 'Zipcode');

echo Form::text('phone', 'Phone Number');

echo Form::close();