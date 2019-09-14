<?php


function skpi_status($stat)
{
	
	if($stat == 1)
	{
		return "Update by mahasiswa";
	}elseif($stat == 2)
	{
		return "ACC Admin";
	}elseif($stat == 3)
	{
		return "Revisi Admin";
	}else
	{
		return "Belum Memasukan data skpi";
	}
}


function explode_name($param)
{
		$name = explode(' ', trim($param) );
		$count = count($name);
		if(count($name) > 1)
		{
			$resp = $name[$count -1].' ';
			for($i=0; $i<$count - 1; $i++)
			{
				$resp = $resp .''.$name[$i];
			}
		}
		else
		{
			 $resp = $param;
		}

		return $resp;
}

function explode_text($text)
	{
		$txt_dt = explode("-", $text);
		return $txt_dt;
	}

function trans_fakultas($fak)
{
		

		$fakultas = array('FST' => 'Fakultas Sains dan Teknologi', 'FIKES' => 'Fakultas Ilmu Kesehatan', 'FISE' => 'Fakultas Ilmu Sosial dan Ekonomi');

		if(array_key_exists($fak, $fakultas))
		{
			return $fakultas[$fak];
		}
		else
		{
			return $fak;
		}
}