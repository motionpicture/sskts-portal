<?php

//��������������������������������������������������������������������
//�� [ USER AGENT DOCOMO SWITCH FUNCTION Ver1.0]
//�� user_agent_docomo.php - 2009/01/27
//�� Copyright (C) DSPT.NET
//�� http://www.dspt.net/
//��������������������������������������������������������������������
	
	//�g�ђ[���̃��[�U�G�[�W�F���g�𔻒�i�h�R���̂�mova��FOMA�̔��ʂ���j
	function user_agent_docomo($data){
		if(preg_match("/^DoCoMo\/1\.0/i", $data))
		{
    		return "mova"; // mova
		}
		if(preg_match("/^DoCoMo\/2\.0/i", $data))
		{
    		return "foma"; // FOMA
		}
		else {
    		return "unknown"; // unknown
		}
	}

?>
