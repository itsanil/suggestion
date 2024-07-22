<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT Department</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    table, th, td {
      border: 1px solid;
    }
  </style>
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
<div>
  
  <h4 style="font-weight: normal !important;">Hello {{$user->name}} </h4>
    <p>Below Suggestion is {{$suggestion->status}}ed.</p>
        <?php 
            $val = $suggestion;
            $getSuggestionData = $val->getSuggestionData;
            $getFeedbackData = $val->getFeedbackData;
            $img = $getSuggestionData->img;
            $img = json_decode($img,true);
            $score_id_data = ($getFeedbackData)?json_decode($getFeedbackData->score_id,true):[];

        ?>
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Title :</th>
                                <td>{{$getSuggestionData->title}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Priority :</th>
                                <td>{{$getSuggestionData->priority}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created By Employee :</th>
                                <td>{{$val->getCreatedBy->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Coardinator :</th>
                                <td>@if($val->getFeedbackData && $val->getFeedbackData->getCoardinator) {{$val->getFeedbackData->getCoardinator->name}} @endif</td>
                            </tr>
                            <tr>
                                <th scope="row">Description :</th>
                                <td>{{$getSuggestionData->desc}}</td>
                            </tr>
                            
                            <tr>
                                <th scope="row">Image Description :</th>
                                <td>{{$getSuggestionData->img_desc}}</td>
                            </tr>
                           
                            <tr>
                                <th scope="row">Feedback By Coardinator :</th>
                                <td>{{($getFeedbackData?$getFeedbackData->feedback_text1:'')}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Feedback By HOD :</th>
                                <td>{{($getFeedbackData?$getFeedbackData->feedback_text2:'')}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Score :</th>
                                <td>{{$val->feedback_score}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status :</th>
                                <td>{{$val->status}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Details :</th>
                                <td>
                                    <a href="{{ route('suggestion.show',$val->id) }}" class="btn btn-primary" target="_blank"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  
  <p>Many Thanks, </p>
  <p>Team IT Department</p>
</div>
<small style="font-size:8px;">This email (including all attachments) is intended for the recipient(s) named above. It may contain confidential or privileged information and should not be read, copied or otherwise used by any other person. If you are not the named recipient, please contact the sender and delete the email from your system. LTD accepts no liability for viruses introduced by this email or attachments and it is your responsibility to employ virus checking software to check this email and any attachments.</small>
</body>
</html>