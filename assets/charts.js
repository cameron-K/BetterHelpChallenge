$(document).ready(function(){
		
		for(q in questions){
			questions[q].females=[];
			questions[q].males=[];
			questions[q].fmax=0;
			questions[q].mmax=0;
			for(fa in female_answers){

				if(questions[q].id===female_answers[fa].question_id){
					if(questions[q].fmax<female_answers[fa].choice_cnt){
						questions[q].fmax=female_answers[fa].choice_cnt;
					}
					if(female_answers[fa].choice=='North America'){
						female_answers[fa].choice='N.A.';
					}
					else if(female_answers[fa].choice=='South America'){
						female_answers[fa].choice='S.A.';
					}
					questions[q].females.push(female_answers[fa]);
				}

				
			}
			for(ma in male_answers){
				if(questions[q].id===male_answers[ma].question_id){
					if(questions[q].mmax<male_answers[ma].choice_cnt){
						questions[q].mmax=male_answers[ma].choice_cnt;
					}
					if(male_answers[ma].choice=='North America'){
						male_answers[ma].choice='N.A.';
					}
					else if(male_answers[ma].choice=='South America'){
						male_answers[ma].choice='S.A.';
					}
					questions[q].males.push(male_answers[ma]);
				}
				
			}

		}


		for(q in questions){
			
			$('#charts').append('<h1>'+questions[q].question+'</h1>');
			var fid='chartfemale'+questions[q].id;
			var mid='chartmale'+questions[q].id;
			$('#charts').append('<div class="chart" id='+fid+'></div><div class="chart" id='+mid+'></div>').append('<div class="header_div" ><h4 class="fheader">Females</h4><h4 class="mheader">Males</h4></div>');

			
			//females
			var chart = c3.generate({
				bindto: document.getElementById('chartfemale'+questions[q].id),
				size:{
					width:'420'
				},
				 padding: {
			        top: 40,
			        bottom:20
			    },
			    tooltip: {
			        show: false
			    },
				data: {
					json: questions[q].females,
					keys: {
						x: 'choice',
						value: ["choice_cnt"]
					},
					type:'bar'
				},
				legend: {
			        show: false
			    },
				axis: {
					x: {
						type: 'category'
					},
					y:{
						tick:{
							count:questions[q].fmax*1+1
						},
						max:questions[q].fmax*1,
						min:0,
						padding: {top: 0, bottom: 0}
					}
				}
			});
			//males
			var chart2 = c3.generate({
				bindto: document.getElementById('chartmale'+questions[q].id),
				size:{
					width:'420'
				},
				padding: {
			        top: 5,
			        bottom:5,
			    },
			    tooltip: {
			        show: false
			    },
				data: {
					json: questions[q].males,
					keys: {
						x: 'choice',
						value: ["choice_cnt"]
					},
					type:'bar'
				},
				legend: {
			        show: false
			    },
				axis: {
					x: {
						type: 'category'
					},
					y:{
						tick:{
							count:questions[q].mmax*1+1
						},
						max:questions[q].mmax*1,
						min:0,
						padding: {top: 0, bottom: 0}
					}
				}
			});
		}
	});