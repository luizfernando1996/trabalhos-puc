package controller.processo.algoritmosEscalonamento.roundRobin;

import controller.processo.NodeProcesso;

public class RoundRobin {
	public int quantum;
	Fila filaProcessos = new Fila();	
	public static int tempoDeEspera, tempoDeExecucao;
	public static String ordemDeExecucao = "-------------------------------Round Robin------------------------------";
	public static double media;

	public void executar() {
		filaProcessos.criarFila();
		NodeProcesso p = filaProcessos.inicio;

		while (p != null) {
			int tempoDeSurto = p.getDuracaoSurto();
			ordemDeExecucao += ("\nProcesso: " + p.getContadorObjeto());
			if (p.terminoUltimaExecucao == 0) {
				tempoDeEspera += tempoDeExecucao - p.getTempoChegada();
			}
			if (p.terminoUltimaExecucao > 0) {
				tempoDeEspera += tempoDeExecucao - p.terminoUltimaExecucao;

			}
			if (tempoDeSurto >= quantum) {
				p.setDuracaoSurto(p.getDuracaoSurto() - quantum);
				tempoDeExecucao += quantum;
			}
			if (tempoDeSurto < quantum) {
				tempoDeExecucao += p.getDuracaoSurto();
				p.setDuracaoSurto(0);
			}
			if (p.getDuracaoSurto() == 0) {
				retiraProcesso(p);
			}
			p.terminoUltimaExecucao = tempoDeExecucao;
			p = p.next;
		}		
		media = tempoDeEspera / NodeProcesso.getContador();
	}

	public void retiraProcesso(NodeProcesso processo) {
		NodeProcesso p = filaProcessos.inicio;

		if (apenasUmNaFila()) {
			p.next = null;

		} else {
			if (p.getContadorObjeto() == processo.getContadorObjeto()) {
				filaProcessos.inicio = p.next;
				filaProcessos.fim.next = p.next;
			} else {

				while (p.next.getContadorObjeto() != p.next.getContadorObjeto()) {

					p = p.next;
				}
				p.next = p.next.next;
			}
		}

	}

	public Boolean apenasUmNaFila() {
		NodeProcesso h = filaProcessos.inicio;
		Boolean condicion = false;
		if (h.getContadorObjeto() == h.next.getContadorObjeto()) {
			condicion = true;
		}
		return condicion;
	}
}
