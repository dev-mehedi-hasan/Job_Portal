<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} - Resume Preview</title>
    <link rel="shortcut icon" href="/../Job_Portal/public/favicon.png" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
    <link rel="stylesheet" href="/../Job_Portal/public/assets/css/resume.css">

</head>
<body>

<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1>{{$user->name}}</h1>
					<h2>@if($info->current_position !== null){{$info->current_position}} @else {{Designation}} @endif</h2>
				</div>

				<div class="yui-u">
					<div class="contact-info">
						<h3><a onclick="window.print();" id="pdf" href="#">Download PDF</a></h3>
						<h3><a href="{{$user->email}}">{{$user->email}}</a></h3>
						<h3>{{$user->phone_number}}</h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Career Objective</h2>
						</div>
						<div class="yui-u">
							<p style="text-align: justify;" class="enlarge">
								@if($info->career_objective !== null){{$info->career_objective}} @else {{objectives}} @endif 
							</p>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">
                            @foreach ($skill as $skills)
								<div class="talent">
									<h2>{{$skills->skill_name}}</h2>
                                </div>
                            @endforeach
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<div class="yui-u">
                            @foreach ($education as $educations)
							<div class="job last">
								<h2>{{$educations->degree}}</h2>
                                <h3>{{$educations->subject}}</h3>
                                <h3>GPA: {{$educations->GPA}}</h3>
								<h4>{{$educations->passing_year}}</h4>
								<p>{{$educations->institute}}</p>
                            </div>  
                            @endforeach
						</div>
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
							<div class="job last">
								<h2>@if($info->current_company !== null){{$info->current_company}} @else {{Company_Namw}} @endif</h2>
                                <h3>@if($info->current_position !== null){{$info->current_position}} @else {{Position}} @endif</h3>
                                <h3>@if($info->work_experience !== null){{$info->work_experience}} @else {{Work_Experience}} @endif Year</h3>
							</div>

						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Project</h2>
                        </div>
                    <div class="yui-u">
                        @foreach ($project as $projects)
                        <div class="job last">
                            <h2>{{$projects->project_title}}</h2>
                            <h3>{{$projects->project_link}}</h3>
                            <p>{{$projects->project_description}}</p>
                        </div>  
                        @endforeach
                    </div><!--// .yui-gf -->
					</div>


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p>{{$user->name}} &mdash; <a href="{{$user->email}}">{{$user->email}}</a> &mdash; {{$user->phone_number}}</p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>

