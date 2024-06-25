package controller.processo.algoritmosEscalonamento.sjf;

public class NodeResultadoSjf {
	public NodeResultadoSjf next;
	public String processoExecutado;
	public String tempoEspera;
	
	public NodeResultadoSjf(String processoExecutado,String tempoEspera){
		this.processoExecutado=processoExecutado;
		this.tempoEspera=tempoEspera;
		next=null;
	}
}
