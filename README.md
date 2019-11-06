Quando pegarem numa tarefa, ponham o vosso nome à frente, passando-a para a part On Going. A partir desse momento ficam responsáveis por verificar se está completa ou não. Quando terminarem a tarefa, passem-na para a parte Conpleted. Façam esta verificação uma vez por dia, para sabermos todos o que estamos a fazer.
ON GOING:
- logotipo
- início da apresentação
- angular app
- view: applicants/index 
	- trocar o estado "a definir" por $applicant->category;
	- criar turmas e fazer foreach das turmas 
- criar páginas para:
	- criar/editar applicant,
	- criar/editar user,
	- criar/editar turma (class) - aqui tem de haver algoritmo para criar o nome da turma, a partir do nome do curso e da data de início
	- criar/editar curso,

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
	- tem de aparecer a sua disponibilidade,
	- o modal tem de perguntar apenas "Tem a certeza?" ou coisa parecida (ou as mesmas coisas com as opções de testes indisponíveis)
	
COMPLETED:
- rever as tags de scripts - são mais que as mães! precisamos de todas?
- acabar o layout da sidebar
- calendário com cores