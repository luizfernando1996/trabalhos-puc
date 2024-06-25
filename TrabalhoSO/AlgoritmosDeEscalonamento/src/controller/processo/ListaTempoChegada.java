package controller.processo;

public class ListaTempoChegada {

	public static NodeProcesso sentinela;

	public ListaTempoChegada() {
		sentinela = new NodeProcesso();
	}

	public Boolean listaVazia() {
		return sentinela.next == null;
	}

	public void InserirProcessoOrdenado(int numeroProcesso, int tempoChegada, int duracaoDoProcesso) {
		
		NodeProcesso novo = new NodeProcesso(numeroProcesso, tempoChegada, duracaoDoProcesso);
		NodeProcesso ant = null;
		NodeProcesso p = sentinela.next;

		while (p != null && p.getTempoChegada() <= tempoChegada) {
			ant = p;
			p = p.next;
		}

		if (ant == null) {
			novo.next = sentinela.next;
			sentinela.next = novo;
		} else {
			// novo.next aponta para o proximo
			novo.next = ant.next;
			// anterior agora aponta para o objeto
			ant.next = novo;
		}	
	}

}