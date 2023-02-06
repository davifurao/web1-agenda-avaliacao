<script>

    let username = '';
    let email = '';
    let password = '';
    let password2 = '';
    
    function handle() {
        // aqui vamos submeter o formulário
        if (password != password2) return;
    
        let form = new FormData();
        form.append('username', username);
        form.append('email' , email);
        form.append('password', password);
        fetch('http://localhost:8000/add-user.php', {
            method: 'POST',
            body: form,
            credentials: "include"
        })
    }
    
    </script>
    
    <h1>Registro de usuário</h1>
    <form on:submit|preventDefault={handle}>
        <input type="text" required bind:value={username} placeholder="nome de usuário">
        <input type="text" required bind:value={email} placeholder="email do usuário">
        <input type="password" required bind:value={password} placeholder="senha">
        <input type="password" required bind:value={password2} placeholder="confirme a senha">
        {#if password != '' && password != password2}
            <div class="danger">Senhas não conferem,olha direito seu miserável!</div>
        {/if}
        <button>Cadastrar!</button>
    </form>
    
    <style>
        form {
            border: 1px solid gray;
            padding: 1em;
            border-radius: 6px;
            
    
        }

        button{
        background-color: aquamarine;
    }
        .danger {
            color: red;
        }
    </style>