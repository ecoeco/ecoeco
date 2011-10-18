$(document).ready(function(){
	/* Следующий код выполняется один раз DOM загружен */
	
	/* Этот флаг будет препятствовать нескольких комментарий представляет: */
	var working = false;
	
	/* Ожидание submit в следующей форме: */
	$('#addCommentForm').submit(function(e){

 		e.preventDefault();
		if(working) return false;
		
		working = true;
		$('#submit').val('Working..');
		$('span.error').remove();
		
		/* Отправка формы с полями в submit.php: */
		$.post('comments/submit.php',$(this).serialize(),function(msg){

			working = false;
			$('#submit').val('Отправить');
			
			if(msg.status){

				/* 
				/	Если вставка прошла успешно, добавить комментарий ниже последней 
				/   на странице с slideDown эффект
				/*/

				$(msg.html).hide().insertBefore('#addCommentContainer').slideDown();
				$('#body').val('');
			}
			else {

				/*
				/	Если бы ошибок, цикл по объекту msg.errors и отображать их на странице
				/*/
				
				$.each(msg.errors,function(k,v){
					$('label[for='+k+']').append('<span class="error">'+v+'</span>');
				});
			}
		},'json');

	});
	
});