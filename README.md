Quando pegarem numa tarefa, ponham o vosso nome à frente, passando-a para a part On Going. A partir desse momento ficam responsáveis por verificar se está completa ou não. Quando terminarem a tarefa, passem-na para a parte Conpleted. Façam esta verificação uma vez por dia, para sabermos todos o que estamos a fazer.

ON GOING:

- início da apresentação (animação para a apresentação) **Inês**
- escolher template para o powerpoint **Inês**
- angular app **Bárbara**
- view: applicants/index 
	- trocar o estado "a definir" por $applicant->category **feito?**;
	- criar turmas **feito** e fazer foreach das turmas (tem de aparecer tantas "caixas" de turmas quanto as que existem na base de dados com o estado activo. estas "caixas" têm de ser geradas dinamicamente)
- criar páginas para:
	- criar/editar applicant,
	- criar/editar user,
	- criar/editar turma (class) **- aqui tem de haver algoritmo para criar o nome da turma, a partir do nome do curso e da data de início** (feito)
	- criar/editar curso,
- criar applicant:
    - manualmente **Inês**
    - importar dados **Bárbara**

TAREFAS:

- design para modal de marcação de entrevista/testes ou provas
- acrescentar opções a marcação de:
	- entrevista,
	- teste psicotécnico + prova de aferição
	- teste psicotécnico + inventário vocacional (são feitos no mesmo dia?)
- temos de conseguir guardar histórico de entrevistas/provas marcadas/efectuadas ou marcadas/não-efectuadas
- fazer triggers para:
	- apt passa a true quando todos os documentos estão entregues,
	- mudar o estado da category consoante:
		- o candidato ainda n foi chamado para nada,
		- o candidato foi chamado pelo menos uma vez,
		- o candidato faltou às convocatórias,
		- o candidato anulou a inscrição
	- se primeiro utilizador => administrador, senão, escolher : [administrador, entrevistador, assistente de formação]
- login de entrevistador: 
	- o calendário não pode ser o mesmo, nem o modal.
	- o modal não pode ter as opções de entrevista, bla bla bla. só serve para confirmar - o modal tem de perguntar apenas "Tem a certeza?" ou coisa parecida (ou as mesmas coisas com as opções de testes indisponíveis)
	- tem de aparecer a sua disponibilidade,
- o calendário pode aparecer em full page
- trocar a imagem da sidebar
- o administrador não pode criar eventos
- 
	
COMPLETED:
- rever as tags de scripts - são mais que as mães! precisamos de todas?
- acabar o layout da sidebar
- calendário com cores
- logotipo