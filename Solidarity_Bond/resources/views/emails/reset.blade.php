<body>
    <div class="container-md">
        <h1>Vous avez demandé à changer votre mot de passe.</h1>
        <div>
            <p>Pour redéfinir votre mot de passe, <a href="{{route('password.reset', $token)}}">cliquez ici</a> !</p>
        </div>
        <hr/>
        <p>Envoyé par {{env('APP_NAME')}}</p>
    </div>
</body>


