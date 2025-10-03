// Script para a página consultatransacoes.html
document.addEventListener('DOMContentLoaded', () => {

    let transactions = [];

    const tableBody = document.querySelector('.tabela-transacoes tbody');
    const addButton = document.querySelector('.adicionar-transacao');

    function renderTable() {
        tableBody.innerHTML = '';
        transactions.forEach(transaction => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${transaction.id}</td>
                <td>
                    <select class="tipo-transacao">
                        <option value="Receita" ${transaction.type === 'Receita' ? 'selected' : ''}>Receita</option>
                        <option value="Despesa" ${transaction.type === 'Despesa' ? 'selected' : ''}>Despesa</option>
                    </select>
                </td>
                
                <td><input type="text" class="descricao-transacao" value="${transaction.description}" placeholder="Ex: Salário, Conta de Luz"></td>
                <td><input type="text" class="valor-transacao" value="${transaction.value}" placeholder="R$ 0,00"></td>
                
                <td><input type="date" class="data-transacao" value="${transaction.date}"></td>
                <td class="actions-cell">
                    <button class="edit-button" data-id="${transaction.id}">Salvar <i class="fa-solid fa-save"></i></button>
                    <button class="delete-button" data-id="${transaction.id}">Excluir <i class="fa-solid fa-trash"></i></button>
                </td>
            `;
            tableBody.appendChild(tr);
        });
    }

    function addTransaction() {
        const newId = transactions.length > 0 ? Math.max(...transactions.map(t => t.id)) + 1 : 1;
        
        const newTransaction = {
            id: newId,
            type: 'Receita',
            description: '', 
            value: '',     
            date: new Date().toISOString().slice(0, 10)
        };
        transactions.push(newTransaction);
        renderTable();
    }

    function saveTransaction(id, rowElement) {
        const transactionToUpdate = transactions.find(t => t.id === id);
        if (transactionToUpdate) {
            transactionToUpdate.type = rowElement.querySelector('.tipo-transacao').value;
            transactionToUpdate.description = rowElement.querySelector('.descricao-transacao').value;
            transactionToUpdate.value = rowElement.querySelector('.valor-transacao').value;
            transactionToUpdate.date = rowElement.querySelector('.data-transacao').value;
            
            alert(`Transação ${id} salva!`);
            rowElement.classList.add('salvo-recentemente');
            setTimeout(() => rowElement.classList.remove('salvo-recentemente'), 2000);
        }
    }

    function deleteTransaction(id) {
        if (confirm(`Tem certeza que deseja excluir a transação ${id}?`)) {
            transactions = transactions.filter(t => t.id !== id);
            renderTable();
        }
    }

    addButton.addEventListener('click', addTransaction);

    tableBody.addEventListener('click', (event) => {
        const editButton = event.target.closest('.edit-button');
        if (editButton) {
            saveTransaction(Number(editButton.dataset.id), editButton.closest('tr'));
        }

        const deleteButton = event.target.closest('.delete-button');
        if (deleteButton) {
            deleteTransaction(Number(deleteButton.dataset.id));
        }
    });

    renderTable();
});

// Script para a página index.html
document.addEventListener('DOMContentLoaded', () => {

    const emailInput = document.querySelector('#Seu-email');
    const cadastroButton = document.querySelector('.botao-cadastro');
    const bancosImage = document.querySelector('.imagem-banco');
    const logo = document.querySelector('.logo');

// Efeito na imagem dos bancos

    bancosImage.addEventListener('mouseover', () => {
        bancosImage.style.transform = 'scale(1.03)';
        bancosImage.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.2)';
        bancosImage.style.transition = 'transform 0.3s ease, boxShadow 0.3s ease';
    });
    bancosImage.addEventListener('mouseout', () => {
        bancosImage.style.transform = 'scale(1)';
        bancosImage.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
    });

// Efeito no logo
     logo.addEventListener('click', () => {
        alert('Bem-vindo ao FinUp! Organize suas finanças de forma simples e gratuita.');
        logo.style.transform = 'rotate(360deg)';
        logo.style.transition = 'transform 0.5s';
        // Faz o logo girar e voltar --- Ajuda do GEMINI ---
        setTimeout(() => {
            logo.style.transform = 'rotate(0deg)';
        }, 500);
    });

// Validação do e-mail no botão de cadastro
    cadastroButton.addEventListener('click', (event) => {

        const email = emailInput.value;

        if (!email.includes('@')) {
            alert('Por favor, digite um e-mail válido antes de continuar.');

            event.preventDefault(); 
        } else {
            alert('Tudo certo! Redirecionando para a página de cadastro...');
        }
    });

});