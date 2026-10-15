<?php
session_start();require_once __DIR__.'/../config/db.php';
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function money($v){return '₦'.number_format((float)$v,2);}
function cartCount(){return array_sum($_SESSION['cart']??[]);}
function csrf(){if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function verifyCsrf(){if(!hash_equals($_SESSION['csrf']??'',$_POST['csrf']??'')){http_response_code(403);exit('Invalid request token.');}}
function cartDetails($pdo){$cart=$_SESSION['cart']??[];if(!$cart)return []; $ids=array_map('intval',array_keys($cart));$marks=implode(',',array_fill(0,count($ids),'?'));$stmt=$pdo->prepare("SELECT * FROM products WHERE id IN ($marks)");$stmt->execute($ids);$items=[];foreach($stmt as $p){$qty=min(max(0,(int)$cart[$p['id']]),(int)$p['stock']);if($qty>0){$p['quantity']=$qty;$p['line_total']=$qty*(float)$p['price'];$items[]=$p;}}return $items;}
