<?php
//Copyright (c) 2016 iFeiwu.com
 class TokenAuth implements iAuthenticate { function __isAuthenticated() { $token = $_GET["\164\x6f\x6b\x65\156"]; return $token && $token == TokenAuth::key() ? TRUE : FALSE; } function key() { return require "\x74\x6f\x6b\x65\156\56\x70\x68\x70"; } }
