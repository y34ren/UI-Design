<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
		<title>UI Design Proof of Concept</title>
		<script src="jquery.min.js"></script>
		<script src="jquery-ui.min.js"></script>
		<style>
			html{
				height: 100%;
			}
			body{
				font-family: Trebuchet MS;
				background:linear-gradient(rgba(193,191,234,1) 100%, rgba(235,233,249,1));
				height: 100%;
			}
			.bigContainer{
				background-color: aliceblue;
				width: 1230px;
				margin: auto;
				border-left: 1px solid #aaa;
				border-right: 1px solid #aaa;
				height: 630px;	
				position: relative;
				top: -10px;
			}
			.style,.file,.tab,.text,.revert,.button{background-color:white;}
			.leftContainer, .rightContainer, .fileManager{
				display: inline-block;
				vertical-align: top;
			}
			.fileManager{
				padding-top: 20px;
				width: 200px;
				text-align: center;
			}
			.styleName{
				width: 150px;
			}
			.leftContainer{
				max-width: 800px;
				margin-top: 20px;
			}
			.text{				
				border: 1px solid #aaa;
				padding: 1px;
			}
			.text:hover{
				border: 1px solid red;
				border-bottom: 0px solid transparent;
			}
			.tab{
				border: 1px solid #aaa;
				border-right: 0px solid transparent;
				border-bottom: 0px solid transparent;
				display: inline-block;
				padding: 3px;
				margin=right: -2px;
			}
			.rightContainer{
				padding-top: 20px;
				width: 200px;
			}
			.appliable{
				cursor: url(https://ssl.gstatic.com/ui/v1/icons/mail/images/2/openhand.cur), default !important;
				margin-top: 20px;
			}
			.editable{
				padding: 5px;
			}
			.active{
				border: 2px solid red;
				padding: 3px;
			}
			.property{
				cursor: url(https://ssl.gstatic.com/ui/v1/icons/mail/images/2/openhand.cur), default !important;
				display: inline-block;
				padding: 3px;
				border: 1px solid #444;
			}
			.bottomContainer{
				margin-top: 20px;
			}
			.save,.question{display:inline-block;}
			 .revert{
				display: inline-block;
				border: 1px solid #aaa;
				padding: 3px;
				cursor: pointer;
			}
			.file{
				display: block;
				width: 120px;
				height: 150px;
				border: 1px solid #aaa;
				margin-left: 40px;
				margin-bottom: 10px;
				margin-top: 10px;
				position: relative;
				top: 0px;
				font-weight: bold;
				font-size: 2em;
				border-top-left-radius: 30px;
			}
			.bottom{
				width: 100%;
				border-top: 1px solid #aaa;
				position: absolute;
				bottom: 0px;
				height: 30px;
				padding-top:4px;
				font-size: 0.5em;
			}
			.name{
				margin-top: 40px;
			}
			.title, .subtitle{
				font-weight: bold;
				font-size: 1.2em;
				text-align: center;
			}
			.title{
				text-align: left;
			}
			.subtitle{
				margin-top: 10px;
			}
			.style{
				border: 1px solid #aaa;
				padding: 5px;
				border-bottom: 0px solid transparent;
				cursor: url(https://ssl.gstatic.com/ui/v1/icons/mail/images/2/openhand.cur), default !important;				
			}
			.button{
				border: 1px solid #aaa;
				text-align: center;
				padding: 4px;
				width: 75%;
				margin: auto;
				margin-top: 5px;
				cursor: pointer;
			}
			#tutorial{
				width: 98%;
				height: 98%;
				position: fixed;
				top:1%;
				left:1%;
				background-color: #FFF;
				border: 1px solid #aaa;
				z-index: 2;
			}
			#editStyle{
				display: none;
				width: 600px;
				height: 320px;
				position: fixed;
				top: 200px;
				right: 600px;
				background-color: #FFF;
				border: 1px solid #aaa;
				z-index: 2;
			}
			.editTitle{
				font-size: 1.5em;
				font-weight: bold;
				margin: 10px;
				display: inline-block;
			}
			.editButton{
				display: inline-block;
				border: 1px solid #aaa;
				padding: 3px;
				cursor: pointer;
			}
			#editButtons{
				float: right;
				padding: 10px;
				display: inline-block;
			}
			#closeBox{
				display: inline-block;
				cursor: pointer;
			}
			#editBottomButtons{
				position: absolute; 
				bottom: 10px;
				right: 10px;
			}
			#editBody{
				vertical-align: top;
				position: relative;
				top: 0px;
			}
			#editPreview{
				margin-left: 20px;
			}
			.previewBox{
				width: 210px;
				border: 1px solid #aaa;
				height: 210px;
				overflow: scroll;
			}
			#editPreview,.editRight{
				display: inline-block;
			}
			.editRight{
				position: absolute;
				top: 10px;
				padding-left: 10px;
			}
			.file{
				cursor: pointer;
			}
			#newFileWizard{
				display: none;
				background-color: white;
				border: 1px solid #aaa;
				width: 300px;
				height: 120px;
				position: fixed;
				top: 200px;
				right: 800px;
				padding: 20px;
				z-index: 2;
			}
			.wizardButton{
				padding: 5px;
				display: inline-block;
				border: 1px solid #aaa;
				cursor: pointer;
			}
			#wizardButtons{float:right;position:relative;top:40px;}
			.tab{
				cursor: pointer;
			}
			.text{
				height: 480px;
				width: 798px;
				overflow: scroll;
			}
			.bottom,.revert,.button,.editButton,.wizardButton,.button{
				background-color: #54546a;
				color: #fffffe;
			}
			.otherTab{background-color:#BBB;}
			.closeTab{color: red;}
			.button{padding:5px;text-align:center;margin:auto;margin-top:2px;}
			.text,.editable{max-height:1000px;}
			.trash{margin-left: 20px;}
			.dots{cursor: pointer;}
			.upload{display:inline-block;position:relative;top:-6px;}
			.existingFiles,.closingArrow{font-weight:bold; font-size:1.3em;}
			.existingFiles{text-align:left;padding-left:20px;}
			.closingArrow{float:right;position:relative;top:-26px;}
			.actionButtons{text-align:right; margin-right:12px;}
			.revertButtons{float:left;position:relative;top:23px;}
			.dots{margin-top:3px; margin-right: 6px;}
			.styleName{position:relative;top:-3px;display:inline-block;}
			label{min-width:100px;display:inline-block;text-align:right;font-weight:bold;}
			.editTem{display:none}
			#premiumFeature{
				width: 400px;
				height: 168x;
				font-size:1.2em;
				font-weight:bold;
				background-color:#e2d9f1;
				border:3px dotted #dec965;
				padding: 10px;
				padding-top:15px;
				position:fixed;
				margin:auto;
				top:100px;
				left:450px;
				z-index:2;
				text-align:justify;
				font-family:"comic sans ms";
				display:none;
			}
			.money{
				text-shadow:-1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
				color:yellow;
				text-align:center;
			}
			#premiumButtons{
				width:400px;
				text-align:right;
				margin-top:30px;
			}
			#premiumButtons .button{
				display:inline-block;
				margin:2px;
			}
			.faded{
				background-color:#BBB;
				border:1px solid #999;
				color:black;
			}
			.openLabel{
				padding-left:0px;
				-moz-user-select: none;
				user-select: none;
			}
			.hidingLabel{
				-moz-user-select: none;
				user-select: none;
				display:none;}
				.nbsp{display:inline;}
				.existingFiles{
				-moz-user-select: none;
				user-select: none;}
				.button{
				-moz-user-select: none;
				user-select: none;}
				.button{
				cursor:pointer;
			}
			.closingArrow,.hide{
				cursor:pointer;
				-moz-user-select: none;
				user-select: none;
			}.unhide{display:none;cursor:pointer;position:relative;top:-30px;}
			.openingArrow{display:inline;
				-moz-user-select: none;
				user-select: none;}
			.revertButtons{
				position:relative;
				top:1px;
			}
		</style>
	</head>
	<body>
		<div id='tutorial'>
			<div id='editHeader'>
				<div id='closeBox' style='position: absolute; top: 1px; right: 1px;'> X </div>
			</div>
			<iframe src="tutorial/tutorial.html" style="border:none;" height="100%" width="100%"></iframe>
			<div id='editBottomButtons'>
				<div class='editButton' id='closeEdit'>Close</div>
			</div>
		</div>
		<div id="premiumFeature">
			<div class="money">$ ♦ $ ♦ $ ♦ $ ♦ $ ♦ $ ♦ $ ♦ $<br/><br/></div>
			This feature is only available in our Premium Pro Package! This is a value package providing many benefits for the low cost of <span style='color:red'>$49.99</span> a month. 
			<div id='premiumButtons'>
				<div class='button faded'>Subscribe now! (coming soon)</div><div class='button closePremium'>Close</div>
			</div>
		</div>
		<div id='editStyle'>
			<div id='editHeader'>
				<div class='editTitle'>Edit Style</div>
				<div id='editButtons'>
					<div class='editButton' id='delete'>Delete</div>
					<div class='editButton'>Import</div>
					<div class='editButton'>Export</div>
					<div id='closeBox'> X </div>
				</div>
			</div>
			<div id='editBody'>
				<div id='editPreview'>
					<div class='subtitle'>Preview</div>
					<div class='previewBox'>
					Here are some preview text. 
					You will see that in your text, if you wanna do this.
					</div>
				</div>
				<div class='editRight'>
					<div class='from' id='' style="display:none"></div>
					<div class='editName'>
						<label>Name: </label> <input id='styleName'></input>
					</div>
					<div class='styleDropdowns'>
						<label>Size: </label>
						<select id='styleSize'>
							<option value="0.8">10</option>
							<option value="1">12</option>
							<option value="1.2">14</option>
							<option value="1.4">16</option>
							<option value="1.6">18</option>
							<option value="1.8">20</option>
							<option value="2">22</option>
						</select><br/>
						<label>Font: </label>
						<select id='styleFont'>
							<option value="Arial, Helvetica, sans-serif">Arial</option>
							<option value="'Arial Black', Gadget, sans-serif">Arial Black</option>
							<option value="'Comic Sans MS', cursive, sans-serif">Comic Sans MS</option>
							<option value="Impact, Charcoal, sans-serif">Impact</option>
							<option value="'Trebuchet MS', Helvetica, sans-serif">Trebuchet MS</option>
							<option value="Georgia, serif">Georgia</option>
							<option value="'Courier New', Courier, monospace">Courier New</option>
							<option value="'Lucida Console', Monaco, monospace">Lucida Console</option>
						</select><br/>
						<label>Colour: </label>
						<select id='styleColor'>
							<option value="Black">Black</option>
							<option value="Red">Red</option>
							<option value="Green">Green</option>
							<option value="Blue">Blue</option>
						</select><br/>
						<label>Bold: </label>
						<input id='styleBold' type='checkbox'><br/>
						<label>Italics: </label>
						<input id='styleItalics' type='checkbox'><br/>
						<label>Underline: </label>
						<input id='styleUnderline' type='checkbox'><br/>
					</div>
				</div>
			</div>
			<div id='editBottomButtons'>
				<div class='editButton' id='saveEdit'>Save</div>
				<div class='editButton' id='closeEdit'>Close</div>
			</div>
		</div>
		<div class='bigContainer'>
			<div class='fileManager'>
				<div class='existingFiles'>Existing Files 
				<div class='closingArrow'><</div></div>
				<hr />
				<div class='file' id="newFile">
					<div class='name'>New</div>
					<div class='bottom'><img src='upload.png'> <div class='upload'>Upload</div></div>
				</div>
				<div class='file'>
					<div class='name'>File1</div>
					<div class='bottom'><img src='download.png'><img class='trash' src='trash.png'></div>
				</div>
				<div class='file'>
					<div class='name'>File2</div>
					<div class='bottom'><img src='download.png'><img class='trash' src='trash.png'></div>
				</div>
			</div>
			<div class='leftContainer'>
				<div class='revertButtons'>
				<div class='existingFiles openLabel'>
					<div class='hidingLabel'> Existing Files 
					<div class='openingArrow'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;></div>
					</div>
					<div class='nbsp'>&nbsp;</div>
				</div>
					<div class='revert'>Revert to Last Save</div>
					<div class='revert'>Undo Style</div>
					<div class='revert'>Redo Style</div>
					<div class='revert' id='reset'>Reset style to defult</div>
				</div>
				<div class='actionButtons'>
					<div class='question'><img src='que.png'></div>
					<div class='save'><img src='save.png'></div>
					<div class='unhide title'>< Styles</div>
				</div>
				<hr>
				<div class='tabs'>
					<div class='tab'>New File (Unsaved) <span class='closeTab'>X</span></div><div class='tab otherTab'>File2 <span class='closeTab'>X</span></div><div class='tab otherTab' style='border-right: 1px solid #aaa'>File3 <span class='closeTab'>X</span></div>
				</div>
				<div class='text' contenteditable=true>
					<div class='editable'>
						<p>The Scotland national football team represents Scotland in international football and is controlled by the Scottish Football Association. It competes in the two major professional tournaments, the FIFA World Cup and the UEFA European Championship. Scotland is not a member of the International Olympic Committee and therefore the national team does not compete in the Olympic Games. The majority of Scotland's home matches are played at the national stadium, Hampden Park.</p>
						<p>Scotland are the joint oldest national football team in the world, alongside England, whom they played in the world's first international football match in 1872. Scotland has a long-standing rivalry with England,[4] whom they played annually from 1872 until 1989. The teams have met only six times since then, most recently in November 2016.</p>
						<p>Scotland have qualified for the FIFA World Cup on eight occasions and the UEFA European Championship twice, but have never progressed beyond the first group stage of a finals tournament. The team have achieved some noteworthy results, such as beating the 1966 FIFA World Cup winners England 3–2 at Wembley Stadium in 1967. Archie Gemmill scored what has been described as one of the greatest World Cup goals ever in a 3–2 win during the 1978 World Cup against the Netherlands, who reached the final of the tournament.[5] In their qualifying group for UEFA Euro 2008, Scotland defeated 2006 World Cup runners-up France 1–0 in both fixtures.</p>
					</div>
				</div>
			</div>
			<div class='rightContainer'>
				<!--<div class='topContainer'>
					<div class='label'>Properties</div>
					<div class='property' id='Bold'>Bold</div>
					<div class='property' id='ComicSans'>ComicSans</div>
					<div class='property' id='Green'>Green</div>
				</div>
				<div class='bottomContainer'>
					<div class='appliable' id="Label1">
						<div class='label'>Label1</div>
						<div class='contents'>No properties applied</div>
					</div>
					<div class='appliable' id="Label2">
						<div class='label'>Label2</div>
						<div class='contents'>No properties applied</div>
					</div>
					<div class='appliable' id="Label3">
						<div class='label'>Label3</div>
						<div class='contents'>No properties applied</div>
					</div>
				</div>-->
				
				<div class='title'><span class='hide'> > Styles</span></div>
				
				<hr /><div class='subtitle'>Default</div>
				<div class='style' id="Title">
					<img class='dots' src='dots.png'>
					<div class='styleName'>Title</div>
					<div class='editTem'>
						<div class='styleName' id='Title'></div>
						<div class='styleSize' id='2'></div>
						<div class='styleFont' id='Times New Roman'></div>
						<div class='styleColor' id='Black'></div>
						<div class='styleBold' id='true'></div>
						<div class='styleItalics' id='false'></div>
						<div class='styleUnderline' id='false'></div>
					</div>
				</div>
				<div class='style' id="Body">
					<img class='dots' src='dots.png'>
					<div class='styleName'>Body</div>
					<div class='editTem'>
						<div class='styleName' id='Body'></div>
						<div class='styleSize' id='1'></div>
						<div class='styleFont' id='Times New Roman'></div>
						<div class='styleColor' id='Black'></div>
						<div class='styleBold' id='false'></div>
						<div class='styleItalics' id='false'></div>
						<div class='styleUnderline' id='false'></div>
					</div>
				</div>
				<div class='style'  id="Double-spaced" style='border-bottom: 1px solid #aaa'>
					<img class='dots' src='dots.png'>
					<div class='styleName'>Hight Light</div>
					<div class='editTem'>
						<div class='styleName' id='Hight Light'></div>
						<div class='styleSize' id='1'></div>
						<div class='styleFont' id='Times New Roman'></div>
						<div class='styleColor' id='Red'></div>
						<div class='styleBold' id='false'></div>
						<div class='styleItalics' id='true'></div>
						<div class='styleUnderline' id='false'></div>
					</div>
				</div>
				
				<hr /><div class='subtitle'>Custom</div>
				<div class='customStyle'></div>
				
				<div class='button' id='createStyle'>Create</div>
				<div class='button' id='removeStyle'>Remove All Styles</div>
			</div>
		</div>
		<script>
			var leftOpen = true;
			var rightOpen = true;
			$(".revert,.save,.upload,.download,.trash,.file,.otherTab,.closeTab").click(function(){
				if($(this).attr('id') != 'newFile' && $(this).attr('id') != 'reset') $("#premiumFeature").css("display","block");
			});
			$(".closePremium").click(function(){
				$("#premiumFeature").css("display","none");
			});
			$(".question").click(function(){
				$("#tutorial").css("display","inline");
			});
			$(".existingFiles").click(function(){
				$(".fileManager").hide();
				$(".leftContainer").css("max-width",(rightOpen?1000:1200)+"px").css("width",(rightOpen?1000:1200)+"px");
				$(".text").css("max-width",(rightOpen?998:1198)+"px").css("width",(rightOpen?998:1198)+"px");
				$(".leftContainer").css("margin-left","10px");
				$(".hidingLabel").css("display","block");
				$(".nbsp").css("display","none");
				leftOpen = false;
			});
			$(".openLabel").click(function(){
				$(".fileManager").show();
				$(".leftContainer").css("max-width",(rightOpen?800:1000)+"px").css("width",(rightOpen?800:1000)+"px");
				$(".text").css("max-width",(rightOpen?798:998)+"px").css("width",(rightOpen?798:998)+"px");
				$(".leftContainer").css("margin-left","0px");
				$(".hidingLabel").css("display","none");
				$(".nbsp").css("display","inline");
				leftOpen = true;
			});
			$(".hide").click(function(){
				$(".leftContainer").css("max-width",(leftOpen?1000:1200)+"px").css("width",(leftOpen?1000:1200)+"px");
				$(".text").css("max-width",(leftOpen?998:1198)+"px").css("width",(leftOpen?998:1198)+"px");
				$(".rightContainer").hide();
				$(".unhide").css("display","inline");
				rightOpen = false;
			});
			$(".unhide").click(function(){				
				$(".leftContainer").css("max-width",(leftOpen?800:1000)+"px").css("width",(leftOpen?800:1000)+"px");
				$(".text").css("max-width",(leftOpen?798:998)+"px").css("width",(leftOpen?798:998)+"px");
				$(".rightContainer").show();
				$(".unhide").css("display","none");		
				rightOpen = true;				
			});
			function setDroppable(){
				$("p").droppable({
					hoverClass: "active",
					drop: function(event, ui){
						//get value
						var parent = ui.draggable;
						var name = parent.find(".styleName").attr('id');
						var size = parent.find(".styleSize").attr('id');
						var font = parent.find(".styleFont").attr('id');
						var color = parent.find(".styleColor").attr('id');
						var bold = parent.find(".styleBold").attr('id');
						var italics = parent.find(".styleItalics").attr('id');
						var underline = parent.find(".styleUnderline").attr('id');
						//set value
						$(this).css("font-size", size+"em");
						$(this).css("font-family", font);
						$(this).css("color", color);
						if(bold=='true') $(this).css("font-weight", "bold");
						else $(this).css("font-weight", "normal");
						if(italics=='true') $(this).css("font-style", "italic");
						else $(this).css("font-style", "normal");
						if(underline=='true') $(this).css("text-decoration", "underline");
						else $(this).css("text-decoration", "none");
					}
				});
			}
			setDroppable();
			$("#closeEdit,#closeBox").click(function(){
				$("#editStyle").css("display","none");
				$("#tutorial").css("display","none");
			});
			$("#reset").click(function(){
				$(".text").find("p").each(function(){
					$(this).removeAttr('style');
				});
			});
			$("#removeStyle").click(function(){
				$(".customStyle").find(".style").each(function(){
					$(this).remove();
				});
			});
			$("#delete").click(function(){
				$("#editStyle").css("display","none");
				var fromid = $(".editRight").find(".from").attr('id');
				$(".customStyle").find("#" + fromid).remove();
			});
			$('.text').keyup(function(event){
				var keycode = (event.keyCode ? event.keyCode : event.which);
				if(keycode == '13')
					setDroppable();
			});
			$("#createStyle").click(function(){
				$("#editStyle").css("display","inline-block");
				//set value
				var fromid = '';
				var name = '';
				var size = '1';
				var font = 'Arial, Helvetica, sans-serif';
				var color = 'Black';
				var bold = 'false';
				var italics = 'false';
				var underline = 'false';
				//set to boxes
				var parent = $(".editRight");
				parent.find(".from").attr('id',fromid);
				parent.find("#styleName").prop('value',name);
				parent.find("#styleSize").val(size);
				parent.find("#styleFont").val(font);
				parent.find("#styleColor").val(color);
				if(bold=='true') parent.find("#styleBold").prop('checked',true);
				else parent.find("#styleBold").prop('checked',false);
				if(italics=='true') parent.find("#styleItalics").prop('checked',true);
				else parent.find("#styleItalics").prop('checked',false);
				if(underline=='true') parent.find("#styleUnderline").prop('checked',true);
				else parent.find("#styleUnderline").prop('checked',false);
				//set to preview
				var preview = $(".previewBox");
				preview.css("font-size", size+"em");
				preview.css("font-family", font);
				preview.css("color", color);
				preview.css("font-weight", "normal");
				preview.css("font-style", "normal");
				preview.css("text-decoration", "none");
			});
			$("#styleSize,#styleFont,#styleColor,#styleBold,#styleItalics,#styleUnderline").click(function(){
				//get value
				var parent = $(".editRight");
				var size = parent.find("#styleSize option:selected").val();
				var font = parent.find("#styleFont option:selected").val();
				var color = parent.find("#styleColor option:selected").val();
				var bold = parent.find("#styleBold").prop('checked');
				var italics = parent.find("#styleItalics").prop('checked');
				var underline = parent.find("#styleUnderline").prop('checked');
				//set preview
				var preview = $(".previewBox");
				preview.css("font-size", size+"em");
				preview.css("font-family", font);
				preview.css("color", color);
				if(bold) preview.css("font-weight", "bold");
				else preview.css("font-weight", "normal");
				if(italics) preview.css("font-style", "italic");
				else preview.css("font-style", "normal");
				if(underline) preview.css("text-decoration", "underline");
				else preview.css("text-decoration", "none");
			});
			$("#saveEdit").click(function(){
				if($(".editRight").find("#styleName").val()==''){
					alert("You have to give a name of this lable!");
				} else {
					$("#editStyle").css("display","none");
					
					var parent = $(".editRight");
					var fromid = parent.find(".from").attr('id');
					var name = parent.find("#styleName").val();
					var size = parent.find("#styleSize option:selected").val();
					var font = parent.find("#styleFont option:selected").val();
					var color = parent.find("#styleColor option:selected").val();
					var bold = parent.find("#styleBold").prop('checked');
					var italics = parent.find("#styleItalics").prop('checked');
					var underline = parent.find("#styleUnderline").prop('checked');
					//set value
					parent = $(".customStyle");
					if(fromid == ''){//add new style
						parent.append("<div class='style' id='" + name + "'><img class='dots' src='dots.png'><div class='styleName'>" + name + "</div><div class='editTem'><div class='styleName' id='"+name+"'></div><div class='styleSize' id='"+size+"'></div><div class='styleFont' id='"+font+"'></div><div class='styleColor' id='"+color+"'></div><div class='styleBold' id='"+bold+"'></div><div class='styleItalics' id='"+italics+"'></div><div class='styleUnderline' id='"+underline+"'></div></div></div>");
						//set draggable
						parent.find("#" + name).draggable({
							revert: true,								
							revertDuration: 0, 
							helper: "clone"
						});
						//set style
						parent.find(".style").css("border-bottom","0px solid #aaa");
						parent.find(".style:last").css("border-bottom","1px solid #aaa");
						//set clickable
						parent.find(".styleName").click(function(){
							$("#editStyle").css("display","inline-block");
							$(".editRight").find(".from").attr('id', $(this).parent().attr('id'));
							//get value
							var parent = $(this).parent().find(".editTem");
							var name = parent.find(".styleName").attr('id');
							var size = parent.find(".styleSize").attr('id');
							var font = parent.find(".styleFont").attr('id');
							var color = parent.find(".styleColor").attr('id');
							var bold = parent.find(".styleBold").attr('id');
							var italics = parent.find(".styleItalics").attr('id');
							var underline = parent.find(".styleUnderline").attr('id');
							//set value
							parent = $(".editRight");
							parent.find("#styleName").prop('value',name);
							parent.find("#styleSize").val(size);
							parent.find("#styleFont").val(font);
							parent.find("#styleColor").val(color);
							if(bold=='true') parent.find("#styleBold").prop('checked',true);
							else parent.find("#styleBold").prop('checked',false);
							if(italics=='true') parent.find("#styleItalics").prop('checked',true);
							else parent.find("#styleItalics").prop('checked',false);
							if(underline=='true') parent.find("#styleUnderline").prop('checked',true);
							else parent.find("#styleUnderline").prop('checked',false);
						});
						$(".style").draggable({
							revert: true,								
							revertDuration: 0, 
							helper: "clone"
						});
						dotsClick();
					} else {//set value
						var lable = parent.find("#" + fromid)
						lable.attr('id', name);
						lable.find(".styleName").html(name);
						parent = lable.find(".editTem");
						parent.find(".styleName").attr("id", name);
						parent.find(".styleSize").attr("id", size);
						parent.find(".styleFont").attr("id", font);
						parent.find(".styleColor").attr("id", color);
						parent.find(".styleBold").attr("id", bold);
						parent.find(".styleItalics").attr("id", italics);
						parent.find(".styleUnderline").attr("id", underline);
					}
				}
			});
			$(".style").draggable({
				revert: true,								
				revertDuration: 0, 
				helper: "clone"
			});
			function dotsClick(){
				$(".dots").click(function(){
					var parent = $(this).parent();
					$(".text").find("p").each(function(){
						//get value
						var name = parent.find(".styleName").attr('id');
						var size = parent.find(".styleSize").attr('id');
						var font = parent.find(".styleFont").attr('id');
						var color = parent.find(".styleColor").attr('id');
						var bold = parent.find(".styleBold").attr('id');
						var italics = parent.find(".styleItalics").attr('id');
						var underline = parent.find(".styleUnderline").attr('id');
						//set value
						$(this).css("font-size", size+"em");
						$(this).css("font-family", font);
						$(this).css("color", color);
						if(bold=='true') $(this).css("font-weight", "bold");
						else $(this).css("font-weight", "normal");
						if(italics=='true') $(this).css("font-style", "italic");
						else $(this).css("font-style", "normal");
						if(underline=='true') $(this).css("text-decoration", "underline");
						else $(this).css("text-decoration", "none");
					});
				});
			}
			dotsClick();
			$("#newFile").click(function(){
				var contents = $(".text");
				contents.html("<div class='editable'><p>This is a new file.</p></div>");
				setDroppable();
			});
			/*
			$(".style").click(function(){
				$("#editStyle").css("display","inline-block");
				$(".editRight").find(".from").attr('id', $(this).attr('id'));
			});
			$(".property").draggable({
				stack: ".property",
				revert: true,								
				revertDuration: 0, 
				helper: "clone"
			});	
			$(".appliable").draggable({
				stack: ".appliable",
				revert: true,								
				revertDuration: 0, 
				helper: "clone"
			});
			$(".appliable").droppable({
				hoverClass: "active",
				drop: function(event, ui){
					var contents = $(this).find(".contents:first");
					if(contents.html() != "No properties applied") contents.append("<div class='property' id='"+ui.draggable.attr('id')+"'>" + ui.draggable.attr('id') + "</div>");
					else contents.html("<div class='property' id='"+ui.draggable.attr('id')+"'>" + ui.draggable.attr('id') + "</div>");
					
					var labelClass = $(this).find(".label:first").text();
					switch(ui.draggable.attr('id')){
						case "Bold":
							$("." + labelClass).css("font-weight", "bold");
							break;
						case "ComicSans":
							$("." + labelClass).css("font-family", "Comic Sans MS");
							break;
						case "Green":
							$("." + labelClass).css("color", "green");
							break;						
					}
				}
			});*/
		</script>
	</body>
</html>