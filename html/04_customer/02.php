<? $d1n=4; $d2n=2; $d3n=0; $d4n=0; ?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/header.php'; ?>

<div class="container">
	<div class="title">
		<div class="tab center">
			<ul class="inline-block">
				<li><a class="score7 font-24" href="/html/04_customer/01.php">공지사항</a></li>
				<li class="active"><a class="score7 font-24" href="/html/04_customer/02.php">FAQ</a></li>
				<li><a class="score7 font-24" href="/html/04_customer/03.php">고객문의</a></li>
			</ul>
		</div>
	</div>

	<div class="board board-img">
		<div class="board-faq">
			<ul>
				<li>
					<div class="acc row">
						<div class="Question">Q.</div>
						<div class="Qtxt col-sm-11 col-xs-10">
							<h4>FUN BUSAN FAQ 질문입니다.</h4>
						</div>
					</div>
					<div class="acc_cont row">
						<div class="Answer">A.</div>
						<div class="Atxt col-sm-11 col-xs-10">
							<p>FUN BUSAN FAQ 답변입니다.</p>
						</div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="acc row">
						<div class="Question">Q.</div>
						<div class="Qtxt col-sm-11 col-xs-10">
							<h4>FUN BUSAN FAQ 질문입니다.</h4>
						</div>
					</div>
					<div class="acc_cont row">
						<div class="Answer">A.</div>
						<div class="Atxt col-sm-11 col-xs-10">
							<p>FUN BUSAN FAQ 답변입니다.</p>
						</div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="acc row">
						<div class="Question">Q.</div>
						<div class="Qtxt col-sm-11 col-xs-10">
							<h4>FUN BUSAN FAQ 질문입니다.</h4>
						</div>
					</div>
					<div class="acc_cont row">
						<div class="Answer">A.</div>
						<div class="Atxt col-sm-11 col-xs-10">
							<p>FUN BUSAN FAQ 답변입니다.</p>
						</div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="acc row">
						<div class="Question">Q.</div>
						<div class="Qtxt col-sm-11 col-xs-10">
							<h4>FUN BUSAN FAQ 질문입니다.</h4>
						</div>
					</div>
					<div class="acc_cont row">
						<div class="Answer">A.</div>
						<div class="Atxt col-sm-11 col-xs-10">
							<p>FUN BUSAN FAQ 답변입니다.</p>
						</div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="acc row">
						<div class="Question">Q.</div>
						<div class="Qtxt col-sm-11 col-xs-10">
							<h4>FUN BUSAN FAQ 질문입니다.</h4>
						</div>
					</div>
					<div class="acc_cont row">
						<div class="Answer">A.</div>
						<div class="Atxt col-sm-11 col-xs-10">
							<p>FUN BUSAN FAQ 답변입니다.</p>
						</div>
					</div>
					<div class="clear"></div>
				</li>
				<li>
					<div class="acc row">
						<div class="Question">Q.</div>
						<div class="Qtxt col-sm-11 col-xs-10">
							<h4>FUN BUSAN FAQ 질문입니다.</h4>
						</div>
					</div>
					<div class="acc_cont row">
						<div class="Answer">A.</div>
						<div class="Atxt col-sm-11 col-xs-10">
							<p>FUN BUSAN FAQ 답변입니다.</p>
						</div>
					</div>
					<div class="clear"></div>
				</li>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
	var accordion_tab = $('.acc'), accordion_content = $('.acc_cont');

	accordion_tab.on('click', function(e)
	{
		// Disable tab links
		e.preventDefault();

		// Remove the active class
		accordion_tab.removeClass('active');

		accordion_content.slideUp('normal');

		if($(this).next().is(':hidden') == true)
		{
			$(this).addClass('active');
			$(this).next().slideDown('normal');
		}
		else
		{
		}
	});
});
</script>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/footer.php'; ?>
