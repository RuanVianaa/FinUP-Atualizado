document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.querySelector('.tabela-transacoes tbody');
    const addButton = document.querySelector('.adicionar-transacao');

    function adicionarLinha() {
        const ultimaLinha = tableBody.querySelector('tr:last-child');
        const ultimoId = ultimaLinha ? parseInt(ultimaLinha.cells[0].textContent) : 0;
        const novoId = ultimoId + 1;

        const novaLinha = document.createElement('tr');

        novaLinha.innerHTML = `
            <td>${novoId}</td>
            <td>
                <select class="tipo-transacao">
                    <option value="Receita">Receita</option>
                    <option value="Despesa">Despesa</option>
                </select>
            </td>
            <td><input type="text" value="Nova Descrição"></td>
            <td><input type="text" value="R$ 0,00"></td>
            <td><input type="date" value="${new Date().toISOString().slice(0, 10)}"></td>
            <td class="actions-cell">
                <button class="edit-button">Salvar <i class="fa-solid fa-save"></i></button>
                <button class="delete-button">Excluir <i class="fa-solid fa-trash"></i></button>
            </td>
        `;
        
        tableBody.appendChild(novaLinha);
    }

    addButton.addEventListener('click', adicionarLinha);

    tableBody.addEventListener('click', (event) => {
        if (event.target.classList.contains('delete-button')) {
            if (confirm('Tem certeza que deseja excluir esta linha?')) {
                event.target.closest('tr').remove();
            }
        }

        if (event.target.classList.contains('edit-button')) {
            alert('Dados da linha salvos!');
        }
    });
});