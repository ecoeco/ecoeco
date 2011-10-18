$(document).ready(function(){
	/* ��������� ��� ����������� ���� ��� DOM �������� */
	
	/* ���� ���� ����� �������������� ���������� ����������� ������������: */
	var working = false;
	
	/* �������� submit � ��������� �����: */
	$('#addCommentForm').submit(function(e){

 		e.preventDefault();
		if(working) return false;
		
		working = true;
		$('#submit').val('Working..');
		$('span.error').remove();
		
		/* �������� ����� � ������ � submit.php: */
		$.post('comments/submit.php',$(this).serialize(),function(msg){

			working = false;
			$('#submit').val('���������');
			
			if(msg.status){

				/* 
				/	���� ������� ������ �������, �������� ����������� ���� ��������� 
				/   �� �������� � slideDown ������
				/*/

				$(msg.html).hide().insertBefore('#addCommentContainer').slideDown();
				$('#body').val('');
			}
			else {

				/*
				/	���� �� ������, ���� �� ������� msg.errors � ���������� �� �� ��������
				/*/
				
				$.each(msg.errors,function(k,v){
					$('label[for='+k+']').append('<span class="error">'+v+'</span>');
				});
			}
		},'json');

	});
	
});