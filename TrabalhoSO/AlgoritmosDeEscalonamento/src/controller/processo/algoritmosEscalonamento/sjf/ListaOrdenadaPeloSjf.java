package controller.processo.algoritmosEscalonamento.sjf;

//import java.util.Scanner;

import controller.processo.ListaTempoChegada;
import controller.processo.NodeProcesso;

public class ListaOrdenadaPeloSjf {

	public NodeProcesso primeiro;
	
	private int tempoDecorrido;

	public ListaOrdenadaPeloSjf() {
		primeiro = null;
	}

	public Boolean listaVazia() {
		return primeiro == null;
	}

	// ordena toda a lista por tempo de duração do surto
	public void ordenarListaPorSjf(NodeProcesso ponteiroSentinela) {

		// int minimo = ponteiro.getDuracaoSurto();
		// int posicao = 0;
		tempoDecorrido = ponteiroSentinela.next.getTempoChegada();
		// A lista que será percorrida ja está ordenada por tempo de chegada
		// Os valores de tempo de chegada só crescem ou são iguais

		while (ponteiroSentinela.next != null) {
			ponteiroSentinela = ListaTempoChegada.sentinela;
			selecionaMenorProcesso(ponteiroSentinela);
		}
		// System.out.println("a");
		// Scanner ler= new Scanner(System.in);
		// ler.nextLine();
		// if (ponteiroSentinela != null)
		// ponteiroSentinela = ponteiroSentinela.next;

	}

	public void selecionaMenorProcesso(NodeProcesso ponteiroSentinela) {

		boolean sair = false;
		NodeProcesso p = ponteiroSentinela.next;
		int menorTempoDeSurto = ponteiroSentinela.next.getDuracaoSurto();

		//objetos utilizados para se implementar a construção de uma nova lista
		NodeProcesso processoQueSeraAdicionadoNaLista = new NodeProcesso();
		processoQueSeraAdicionadoNaLista = ponteiroSentinela.next;
		
		NodeProcesso processoAnteriorAoAdicionadoNaLista = new NodeProcesso();
		processoAnteriorAoAdicionadoNaLista = ponteiroSentinela;

		while (sair == false) {
			// Se o tempo de chegada for maior que tempo atual tem que sair
			if (p != null)
				if (p.getTempoChegada() > tempoDecorrido) {
					sair = true;
				}
				// Se existir um processo que tem tempo de chegada menor ou
				// igual ao
				// tempo atual tem que entrar no else
				else {

					if (p.next != null) {
						if (p.next.getTempoChegada() < tempoDecorrido) {
							if ((p.next.getDuracaoSurto() < menorTempoDeSurto) && (sair != true)) {
								menorTempoDeSurto = p.getDuracaoSurto();

								processoAnteriorAoAdicionadoNaLista = p;

								// O processo com menor tempo de surto e com o
								// tempo
								// de
								// chegada correto será adicionado na lista
								processoQueSeraAdicionadoNaLista = p.next;
							}
							// else
							// sair=true;
						}
					}
				}
			if (p != null && sair != true)
				p = p.next;
			else
				sair = true;
		}
		// retira o processo que será adiconado na lista sjf da lista de tempo
		// de
		// chegada
		processoAnteriorAoAdicionadoNaLista.next = processoQueSeraAdicionadoNaLista.next;

		processoQueSeraAdicionadoNaLista.next = null;
		tempoDecorrido += processoQueSeraAdicionadoNaLista.getDuracaoSurto();

		insere(processoQueSeraAdicionadoNaLista);

	}

	public void insere(NodeProcesso obj) {
		NodeProcesso p = primeiro;

		if (listaVazia())
			primeiro = obj;
		else {
			while (p.next != null)
				p = p.next;
			p.next = obj;
		}
	}
}
