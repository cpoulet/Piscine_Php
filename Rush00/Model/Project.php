<?php

require_once 'Model/Model.php';

class Project extends Model {

    public static function getAll() {
        $db =static::getDB();
        $out = array();
		$rslt = mysqli_query($db, 'SELECT * FROM projects');
		$rslt !== False or die("You should Install de database First !");
        while($data = mysqli_fetch_assoc($rslt))
            array_push($out, $data);
        return $out;
    }

    public static function getid($id) {
        $db =static::getDB();
		$req_pre = mysqli_prepare($db, "SELECT id, name, price FROM projects WHERE id = ?");
		mysqli_stmt_bind_param($req_pre, "i", intval($id));
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $i, $name, $price);
		mysqli_stmt_fetch($req_pre);
		$out = ['id' => $i, 'name' => $name, 'price' => $price];
        return $out['id'] !== NULL ? $out : False;
    }

    public static function getCat($categorie) {
        $db =static::getDB();
        $out = array();
		$req_pre = mysqli_prepare($db, "SELECT id, name, price, description, image FROM projects WHERE categorie = ?");
		mysqli_stmt_bind_param($req_pre, "i", $categorie);
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $id, $name, $price, $description, $image);
		while (mysqli_stmt_fetch($req_pre))
			$out[] = ['id' => $id, 'name' => $name, 'price' => $price, 'description' => $description, 'image' => $image];
		return $out;
    }

	public static function getCats($ctg) {
		$code = array();
		$ctg['base'] === false or $code[] = '1';
		$ctg['algo'] === false or $code[] = '2';
		$ctg['shell'] === false or $code[] = '3';
		$ctg['graph'] === false or $code[] = '4';
		$ctg['web'] === false or $code[] = '5';
		$out = array();
		foreach ($code as $categorie) {
			$data = static::getCat($categorie);
			if ($data !== false)
				$out[] = $data;
		}
		return $out;
	}
}
?>
