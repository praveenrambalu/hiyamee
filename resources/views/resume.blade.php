<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }


    </style>
</head>

<body
    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; background-color: #ffffff; color: #718096; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation"
        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #edf2f7; margin: 0 auto; padding: 0; width: 100%;">

        <tr  >
            <td colspan="6" style="padding-bottom:5px; padding-left:10px; padding-right:10px; border-bottom:1px solid #fff;">
                <h3 style="font-size:2rem; text-align:center; ">{{$company->company_name ?? ' ' }}  - #{{$candidate->id ?? ' ' }}  </h3>
                @switch($candidate->interview_outcome)
                    @case('Ready')
                            <h3 style="text-align:center; font-size:1.5rem; color:blue">Interview Not Yet Done</h3>
                        @break
                    @case('Selected')
                            <h3 style="text-align:center; font-size:1.5rem; color:green">{{$candidate->interview_outcome ?? ' ' }} </h3>
                        @break
                    @case('Rejected')
                            <h3 style="text-align:center; font-size:1.5rem; color:red">{{$candidate->interview_outcome ?? ' ' }} </h3>
                        @break
                    @case('Interviewed')
                            <h3 style="text-align:center; font-size:1.5rem; color:orange">{{$candidate->interview_outcome ?? ' ' }} </h3>
                        @break
                
                    @default
                    <h3 style="text-align:center; font-size:1.5rem; ">{{$candidate->interview_outcome ?? ' ' }} </h3>
                @endswitch
            </td>
        </tr>
        <tr >
            <td colspan="6" style="padding-left:10px; padding-right:10px;">
                <h4 style="font-size:1rem; text-align:center">{{$job->job_title ?? ' ' }} </h4>
            </td>
        </tr>
        <tr >
            <td colspan="3">
                <p style="font-size:1rem; text-align:left;"><b>Skills : </b>{{$job->primary_skill ?? ' ' }}  , {{$job->skills_required ?? ' ' }} </p>
            </td>
            <td colspan="3">
                <p style="font-size:1rem; text-align:right;">Location : {{$job->location ?? ' ' }} </p>
            </td>
        </tr>

        <tr style="background:#fff;">
            <td colspan="2">
                <h3 style="font-size:1.5rem; text-align:left;">{{$candidate->candidate_name ?? ' ' }} </h3>
            </td>
            <td colspan="2">
                <h5 style="font-size:1rem; text-align:right;">DOB : {{$candidate->dateofbirth ?? ' ' }} </h5>
            </td>
            <td colspan="2">
                <h5 style="font-size:1rem; text-align:right;">Gender : {{$candidate->gender ?? ' ' }} </h5>
            </td>
        </tr>
        <tr  >
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Email : </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->candidate_email ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #fff;  border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Phone No : </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->candidate_phone ?? ' ' }} </p>
            </td>
        </tr>
        <tr >
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Location : </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->location ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Preferred Location : </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->prelocation ?? ' ' }} </p>
            </td>
        </tr>
        <tr >
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Experience : </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff;  border-left:none;padding-left:10px; padding-right:10px;">
                <p>{{$candidate->experience ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #fff;  border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Relevent Experience : </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->relexperience ?? ' ' }} </p>
            </td>
        </tr>
        <tr >
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Current CTC : </b></p>
            </td>
            <td colspan="1" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->current_ctc ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Expected CTC : </b></p>
            </td>
            <td colspan="1" style="border:1px solid #fff;  border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->expected_ctc ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Negotiable CTC : </b></p>
            </td>
            <td colspan="1" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->neg_ctc ?? ' ' }} </p>
            </td>
        </tr>

        <tr >
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Current Company : </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff;  border-left:none;padding-left:10px; padding-right:10px;">
                <p>{{$candidate->current_company ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #fff;  border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Notice Period : </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->notice_period ?? ' ' }} </p>
            </td>
        </tr>
        <tr >
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>PAN Card  : </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff;  border-left:none;padding-left:10px; padding-right:10px;">
                <p>{{$candidate->pancard ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #fff;  border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Buyout: </b></p>
            </td>
            <td colspan="2" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->buyout ?? ' ' }} </p>
            </td>
        </tr>

        <tr style="background:#fff;">
            <td colspan="1" style="border:1px solid #edf2f7; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Interview Date  : </b></p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7;  border-left:none;padding-left:10px; padding-right:10px;">
                <p>{{$candidate->interview_date ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7;  border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Interview Time: </b></p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->interview_time ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7;  border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Interview Completed At: </b></p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate->interview_completed_at ?? ' ' }} </p>
            </td>
        </tr>

        <tr  style="background:#fff;">
            <td colspan="1" style="border:1px solid #edf2f7; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Interviewer Name: </b></p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$interviewer->name ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Interviewer Email : </b></p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7;  border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$interviewer->email ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Interviewer Phone : </b></p>
            </td>
            <td colspan="1" style="border:1px solid #edf2f7; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$interviewer->phoneno ?? ' ' }} </p>
            </td>
        </tr>

        <tr  >
            <td colspan="1" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Uploader Name : </b></p>
            </td>
            <td colspan="1" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate_creator->name ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #fff;  border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Uploader Email : </b></p>
            </td>
            <td colspan="1" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate_creator->email ?? ' ' }} </p>
            </td>
            <td colspan="1" style="border:1px solid #fff;  border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Uploader Phone : </b></p>
            </td>
            <td colspan="1" style="border:1px solid #fff; border-left:none; padding-left:10px; padding-right:10px;">
                <p>{{$candidate_creator->phoneno ?? ' ' }} </p>
            </td>
        </tr>
        <tr  >
            <td colspan="6" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Notes : </b></p>
                {!!$candidate->notes!!}
            </td>
            
        </tr>
        <tr  >
            <td colspan="6" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Additional Notes : </b></p>
                {!!$candidate->additional_notes!!}
            </td>
            
        </tr>
        <tr  >
            <td colspan="6" style="border:1px solid #fff; border-right:none; padding-left:10px; padding-right:10px;">
                <p><b>Update History : </b></p>
                {!!$candidate->update_history!!}
            </td>
            
        </tr>


    </table>
</body>

</html>