<script>
    import { onMount } from "svelte";
  
    let nome = "";
    let endereco = "";
    let email = "";
    let numero = "";
    let numero_mostrado = [];
  
    async function loadcontact() {
      //vai chamar o arquivo get-user-contatos
      const response = await fetch("http://localhost:8000:8000/get-user-contatos.php", {
        credentials: "include",
      });
      if (!response.ok) {
        alert("Você não está logado");
        return;
      }
      numero_mostrado = await response.json();
    }
  
    onMount(() => {
      loadcontact();
    });
  
    async function handle() {
      const form = new FormData();
      form.append("nome", nome);
      form.append("endereco", endereco);
      form.append("email", email);
      form.append("numero_mostrado", numero);
      const response = await fetch("http://localhost:8000/add-contatos.php", {
        method: "POST",
        body: form,
        credentials: "include",
      });
      if (!response.ok) {
        alert("deu algo errado,resumindo:fudeu");
        return;
      }
      loadcontact();
    }
  
    async function deletenumero_mostrado(id) {
      const form = new FormData();
      form.append("id", id);
      const response = await fetch("http://localhost:8000/delete-contatos.php", {
        method: "POST",
        body: form,
        credentials: "include",
      });
      if (!response.ok) {
        alert("Deu erro");
        return;
      }
      loadcontact();
    }
  </script>
  
  {#each numero_mostrado as numero_mostrado}
    <div>
      {numero_mostrado.CONT_NOME} - {numero_mostrado.CONT_ENDERECO} - {numero_mostrado.CONT_EMAIL} - {numero_mostrado.CONT_NUMERO}
      <span on:click={() => deletenumero_mostrado(numero_mostrado.CONT_USER_ID)}>&times;</span>
    </div>
  {/each}
  
  <form on:submit|preventDefault={handle}>
    <input type="text" placeholder="nome" bind:value={nome} />
    <input type="text" placeholder="endereco" bind:value={endereco}/>
    <input type="text" placeholder="email" bind:value={email}/>
    <input type="text" placeholder="numero" bind:value={numero}/>
    <button>Cadastrar</button>
  </form>
  
  <style>
    div > span {
      cursor: pointer;
      color: red;
    }
  </style>
  