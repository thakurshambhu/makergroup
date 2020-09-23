<!DOCTYPE html>
<html>
  <head>
    <title>Activate Account</title>
  </head>
  <body>
    <h2>Welcome to the Stormbordz {{$data['name']}}</h2>
    <br/>
    Your registered email-id is {{$data['email']}} , Please click on the below link to activate your account
    <br/>
    <a href="{{$data['activateurl']}}/{{'activate_account'}}/{{$token->token}}">Activate Account</a>
  </body>
</html>