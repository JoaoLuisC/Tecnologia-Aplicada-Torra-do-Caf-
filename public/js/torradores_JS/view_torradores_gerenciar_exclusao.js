const checkboxes = document.querySelectorAll('.torrador-checkbox');
const btnExcluir = document.getElementById('btnExcluir');
const confirmarExcluir = document.getElementById('confirmarExcluir');

// Habilitar/desabilitar botão "Excluir" com base nos checkboxes
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        const algumSelecionado = Array.from(checkboxes).some(cb => cb.checked);
        btnExcluir.disabled = !algumSelecionado;
    });
});

// Confirmar exclusão
confirmarExcluir.addEventListener('click', () => {
    const idsSelecionados = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.value);

    if (idsSelecionados.length > 0) {
        fetch('../../app/controllers/excluir_torradores.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ ids: idsSelecionados })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Recarregar a página após exclusão
            } else {
                alert('Erro ao excluir torradores.');
            }
        })
        .catch(error => console.error('Erro:', error));
    }
});