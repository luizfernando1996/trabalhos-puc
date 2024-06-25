package view.frames;

import javax.swing.JFrame;
import javax.swing.JLabel;
import java.awt.Font;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.LayoutStyle.ComponentPlacement;
import controller.processo.algoritmosEscalonamento.sjf.Sjf;
import controller.processo.algoritmosEscalonamento.roundRobin.RoundRobin;
import controller.processo.algoritmosEscalonamento.sjf.NodeResultadoSjf;
import javax.swing.JTextArea;
import javax.swing.JScrollPane;

public class JFrameResultado extends JFrame {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	/**
	 * Create the frame.
	 */
	public JFrameResultado() {
		setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		setBounds(100, 100, 421, 440);

		JLabel lblAOrdemDe = new JLabel("A ordem de execução dos processos:");
		lblAOrdemDe.setFont(new Font("Tahoma", Font.BOLD, 12));

		JLabel lblOTempoDe = new JLabel("O tempo de espera foi:");
		lblOTempoDe.setFont(new Font("Tahoma", Font.BOLD, 12));

		JScrollPane scrollPane_2 = new JScrollPane();

		JScrollPane scrollPane = new JScrollPane();

		JTextArea textArea = new JTextArea();

		JLabel lblOTempoDe_1 = new JLabel("O tempo de médio espera dos processos foi:");
		lblOTempoDe_1.setFont(new Font("Tahoma", Font.BOLD, 12));
		GroupLayout groupLayout = new GroupLayout(getContentPane());
		groupLayout.setHorizontalGroup(groupLayout.createParallelGroup(Alignment.TRAILING).addGroup(groupLayout
				.createSequentialGroup()
				.addGroup(groupLayout.createParallelGroup(Alignment.LEADING)
						.addGroup(groupLayout.createSequentialGroup().addGap(72).addComponent(lblAOrdemDe))
						.addGroup(groupLayout.createSequentialGroup().addGap(34).addGroup(groupLayout
								.createParallelGroup(Alignment.LEADING)
								.addComponent(scrollPane_2, GroupLayout.PREFERRED_SIZE, 332, GroupLayout.PREFERRED_SIZE)
								.addComponent(scrollPane, GroupLayout.PREFERRED_SIZE, 324, GroupLayout.PREFERRED_SIZE)
								.addComponent(textArea, GroupLayout.PREFERRED_SIZE, 322, GroupLayout.PREFERRED_SIZE))
								.addGap(77)
								.addComponent(lblOTempoDe, GroupLayout.PREFERRED_SIZE, 225, GroupLayout.PREFERRED_SIZE))
						.addGroup(groupLayout.createSequentialGroup().addGap(69).addComponent(lblOTempoDe_1,
								GroupLayout.PREFERRED_SIZE, 271, GroupLayout.PREFERRED_SIZE)))
				.addContainerGap(GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)));
		groupLayout.setVerticalGroup(groupLayout.createParallelGroup(Alignment.LEADING)
				.addGroup(groupLayout.createSequentialGroup().addContainerGap().addComponent(lblAOrdemDe)
						.addPreferredGap(ComponentPlacement.UNRELATED)
						.addComponent(scrollPane_2, GroupLayout.PREFERRED_SIZE, 141, GroupLayout.PREFERRED_SIZE)
						.addPreferredGap(ComponentPlacement.RELATED)
						.addComponent(lblOTempoDe_1, GroupLayout.PREFERRED_SIZE, 23, GroupLayout.PREFERRED_SIZE)
						.addPreferredGap(ComponentPlacement.UNRELATED)
						.addComponent(textArea, GroupLayout.PREFERRED_SIZE, 165, GroupLayout.PREFERRED_SIZE)
						.addPreferredGap(ComponentPlacement.RELATED)
						.addGroup(groupLayout.createParallelGroup(Alignment.LEADING)
								.addComponent(lblOTempoDe, GroupLayout.PREFERRED_SIZE, 15,
										GroupLayout.PREFERRED_SIZE)
								.addGroup(groupLayout.createSequentialGroup().addGap(19).addComponent(scrollPane,
										GroupLayout.PREFERRED_SIZE, 167, GroupLayout.PREFERRED_SIZE)))
						.addContainerGap(GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)));

		JTextArea textArea_1 = new JTextArea();
		scrollPane_2.setViewportView(textArea_1);
		getContentPane().setLayout(groupLayout);

		Sjf objSjf = new Sjf();
		if (Sjf.sjf) {
			NodeResultadoSjf inicio = objSjf.resultadosPedidos();

			String mensagem = "";
			String tempoEspera = "";
			NodeResultadoSjf p = inicio;
			int cont = 0;
			while (p != null) {
				// geralmente em strings para não ficar valores nulls deve se
				// colocar
				// um caso para somente uma unica execução
				if (cont == 0) {
					mensagem = p.processoExecutado + "\n";
					tempoEspera = p.tempoEspera + "\n";
					cont++;// dentro deste caso vc coloca para nunca mais ele
					// acontecer
				} else {
					mensagem += p.processoExecutado + "\n";
					tempoEspera += p.tempoEspera + "\n";
				}
				p = p.next;
			}
			textArea.setText(tempoEspera);
			textArea_1.setText(mensagem);

		} else {
			String infor = Double.toString(RoundRobin.media);
			textArea.setText(infor);

			String mensagem2 = RoundRobin.ordemDeExecucao;
			textArea_1.setText(mensagem2);
		} 	
	}
}
