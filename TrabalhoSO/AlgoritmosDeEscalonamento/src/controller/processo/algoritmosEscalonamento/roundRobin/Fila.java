package controller.processo.algoritmosEscalonamento.roundRobin;

import controller.processo.ListaTempoChegada;
import controller.processo.NodeProcesso;

public class Fila {
	
	public  NodeProcesso inicio, fim;
	
	public void criarFila(){
		inicio = ListaTempoChegada.sentinela.next;
		inserirFila(inicio);
	}
	
	public void inserirFila(NodeProcesso inicio){
		NodeProcesso p = inicio;
		
		while(p.next != null){
			p = p.next;
		}
		
		fim = p;
		fim.next = inicio;
	}

}
