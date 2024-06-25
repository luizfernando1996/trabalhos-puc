﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using TrabalhoAED.FolderAeroporto;
using TrabalhoAED.Avioes;
using System.IO;

/// <summary>
/// Trabalho AED
/// 15/04/2017 
/// Alunos:Luiz Fernando e Jonathan Dias.
/// </summary>

namespace TrabalhoAED.Menu
{
    class Menu
    {
        //caminho do arquivo
        private string strPathFile = "D:/Luiz Fernando/TrabalhoAed/TrabalhoAED/TrabalhoAED/Menu/Teste.txt";

        //Inicio dos atributos/objetos da classe
        private Voo objVoo = new Voo();
        private Aeroporto objAero = new Aeroporto();

        /*fim dos atributos/objetos da classe*/

        //Métodos para string
        public void imprimeMessage(string message, int position = 0)
        {
            switch (position)
            {
                case 0:
                    Console.WriteLine(message);
                    break;
                case 1:
                    Console.Write("\t");
                    break;
                case 2:
                    Console.Write("\n");
                    break;
                case 3:
                    Console.WriteLine();
                    break;
                case 4:
                    Console.Write(message);
                    break;
                default:
                    break;
            }
        }
        //solicita a string no inicio=0 ou no meio=1
        public string solicitaString(int position = 0)
        {

            switch (position)
            {
                //solicita string no meio da tela
                case 1:
                    Console.Write("\t");
                    break;
                default:
                    break;
            }
            return Console.ReadLine();
        }
        //fim dos métodos para string

        /*Métodos para inteiro*/
        public bool verificaInt(string num)
        {
            int n;
            bool wordIsString = int.TryParse(num, out n);
            return wordIsString;
        }
        public int requisitaInt()
        {
            bool sairWhile = false;
            string num = null;
            while (sairWhile == false)
            {
                Console.Write("\t");
                num = Console.ReadLine();
                //verifica se foi digitado um numero inteiro
                sairWhile = verificaInt(num);

                //se o numero não for inteiro
                if (sairWhile == false)
                {
                    Console.ForegroundColor = ConsoleColor.Red;
                    Console.WriteLine("\tDigite um número, por favor");
                    Console.ForegroundColor = ConsoleColor.White;

                }
            }
            return int.Parse(num);
        }
        public int requisitaIntNoRange(int range)
        {
            int num = 0;
            bool sairWhile = false;
            while (sairWhile == false)
            {
                //requisita um inteiro
                num = requisitaInt();
                if (num >= 0 && num <= range)
                    sairWhile = true;
                else
                {
                    string message = "Digite um numero entre 0 a " + range;
                    imprimeMessage(message);
                }
                //requisitaIntRange();//pode dar overflow se o usuario errar mts vezes
                //melhor while
            }
            return num;
        }
        //fim dos métodos para inteiro

        /*gerencia o menu*/
        public void gerenciadorMenu()
        {
            bool sairWhile = false;

            //gerencia a repetição e saida do menu
            while (sairWhile == false)
            {
                exibeMenu();
                //o menu tem 8 opções, logo o número deve estar no range 0-9
                int num = opcaoEscolhidaDoMenu(9);
                selecionaOptionMenu(num);
                //Usuario deseja sair do programa
                if (num == 0)
                    sairWhile = true;
            }
        }
        public void exibeMenu()
        {
            string message = null;
            message = "---------------------------Menu------------------------";
            message += "\nDigite 1 para cadastrar Aeroportos";
            message += "\nDigite 2 para cadastrar Voos";
            message += "\nDigite 3 para remover voos";
            message += "\nDigite 4 para imprimir os voos";
            message += "\nDigite 5 para imprimir tudo";
            message += "\nDigite 6 para procurar voo";
            message += "\nDigite 7 para limpar";
            message += "\nDigite 8 para procurar voo";
            message += "\nDigite 9 para inserir entradas no programa - TESTE";
            message += "\nDigite 0 para sair";
            imprimeMessage(message);
        }
        public int opcaoEscolhidaDoMenu(int range)
        {
            int num = 0;
            //requisita um numero inteiro valido no range
            num = requisitaIntNoRange(range);
            return num;
        }
        public void selecionaOptionMenu(int num)
        {
            switch (num)
            {
                case 1:
                    //cadastra um aeroporto solicitando uma cidade e gerando um código  
                    cadastraAeroporto();
                    break;
                case 2:
                    cadastraVoo();
                    break;
                case 3:
                    removeVoo();
                    break;
                case 4:
                    imprimeVoo();
                    break;
                case 5:
                    imprimeTudo();
                    break;
                case 6:
                    procuraVoo();
                    break;
                case 7:
                    limparMenu();
                    break;
                case 8:
                    procuraVoo();
                    break;
                case 9:
                    insereDadosParaTeste();
                    break;
                case 0:
                    finalizarProgram();
                    break;
            }
        }

        //Opções do menu--> 1
        public void cadastraAeroporto()
        {
            Aeroporto obj = new Aeroporto();

            string message = "Digite o nome da cidade";
            imprimeMessage(message);

            string cidade = solicitaString();
            string resultado = obj.cadastraAeroporto(cidade);
            imprimeMessage(resultado);
        }

        //métodos para cadastrarVoo -->OPÇÃO 2 DO MENU
        public void cadastraVoo()
        {
            gerenciaIndicesCidades();

        }
        public void gerenciaIndicesCidades()
        {
            int numeroVoo = solicitaNumeroVoo();

            string message;
            //solicita uma aeroporto de origem CADASTRADO
            int indiceCidadeOrigem = solicitaCidadeOrigem();
            if (indiceCidadeOrigem != 10)
            {
                //solicita uma aeroporto de destino CADASTRADO
                int indiceCidadeDestino = solicitaCidadeDestino();
                if (indiceCidadeDestino != 10)
                {
                    //retorna se cadastrou ou não o voo,isto é, se não existe voo com o mesmo numero
                    message = objVoo.cadastraVoo(numeroVoo, indiceCidadeOrigem, indiceCidadeDestino);
                }
                else
                    message = "Aeroporto de destino não cadastrado";
            }
            else
                message = "Aeroporto de origem não cadastrado";

            imprimeMessage(message);
        }
        public int solicitaNumeroVoo()
        {
            string message = "Identifique o codigo do Voo";
            imprimeMessage(message);
            int numeroVoo = requisitaInt();
            return numeroVoo;
        }
        public int solicitaCidadeOrigem()
        {
            string message = "Digite a cidade do Aeroporto de Origem";
            imprimeMessage(message);

            string cidadeOrigem = solicitaString(1);

            int indiceExiste = objAero.encontraIndiceAeroportoPelaCidade(cidadeOrigem);
            return indiceExiste;
        }
        public int solicitaCidadeDestino()
        {
            string message = "Digite o cidade do Aeroporto de Destino";
            imprimeMessage(message);

            string cidadeDestino = solicitaString(1);
            int indiceCidadeDestino = objAero.encontraIndiceAeroportoPelaCidade(cidadeDestino);
            return indiceCidadeDestino;
        }
        //fim dos métodos para cadastrarVoo

        //Opções do menu--> 3,4,5,6,7,8
        public void removeVoo()
        {
            string menssagem = "Digite o numero do voo a ser removido";
            imprimeMessage(menssagem);

            int numero = requisitaInt();
            //retorna uma mensagem de sucesso ou não sobre a remoção do Voo
            menssagem = objAero.removeVoo(numero);
            imprimeMessage(menssagem);
        }
        //imprime todos voos de um determinado aeroporto
        public void imprimeVoo()
        {
            string message = "Forneça a sigla do Aeroporto";
            imprimeMessage(message);
            string sigla = Console.ReadLine();
            string messagem = objAero.imprimeVoo(sigla);
            imprimeMessage(messagem);
        }
        public void imprimeTudo()
        {
            string mensagem=objAero.imprimeTudo();
            imprimeMessage(mensagem);
        }
        public void limparMenu()
        {
            Console.Clear();
        }
        public void procuraVoo()
        {
            string message = "Digite a sigla de origem do Aeroporto";
            imprimeMessage(message);
            string siglaOrigem = solicitaString();
            //objAero.buscaSigla();

            message = "Digite a sigla de destino do Aeroporto";
            imprimeMessage(message);
            string siglaDestino = solicitaString();
            //objAero.buscaSigla();

            message = "Digite o limite maximo de conexões que deve ser apresentado";
            imprimeMessage(message);
            int maximoConexoes = requisitaInt();

            message = objAero.procuraVoo(siglaOrigem, siglaDestino, maximoConexoes);
            imprimeMessage(message);
        }

        //métodos de teste -->OPÇÃO 9 DO MENU
        public void insereDadosParaTeste()
        {
            using (FileStream sw = new FileStream(strPathFile, FileMode.Create)) { }
            //cadastra os voos e os aeroportos 
            cadastrarAeroportosTeste();
            cadastrarVoosTeste();
            string mensagem = null;
            Console.WriteLine("==========================RESULTADOS========================");
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine("==========================RESULTADOS========================"); }

            //realiza os testes

            //imprime o comando
            mensagem = "procuraVoo(GIG, SSA, 3)";
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            //imprime o resultado do comando
            mensagem = objAero.procuraVoo("GIG", "SSA", 3);
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            Console.WriteLine();
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(); }
            //imprime o comando
            mensagem = "procuraVoo(CNF, GRU, 2)";
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            //imprime o resultado do comando
            mensagem = objAero.procuraVoo("CNF", "GRU", 2);
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            Console.WriteLine();
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(); }
            //imprime o comando
            mensagem = "imprimeVoo(CNF)";
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            //imprime o resultado do comando
            mensagem = objAero.imprimeVoo("CNF");
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            Console.WriteLine();
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(); }
            //imprime o comando
            mensagem = "removeVoo(890)";
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            //imprime o resultado do comando
            mensagem = "\n" + objAero.removeVoo(890);
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            Console.WriteLine();
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(); }
            //imprime o comando
            mensagem = "removeVoo(101)";
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            //imprime o resultado do comando
            mensagem = "\n" + objAero.removeVoo(101);
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            Console.WriteLine();
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(); }
            //imprime o comando
            mensagem = "procuraVoo(CNF, BSB, 2)";
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            //imprime o resultado do comando
            mensagem = objAero.procuraVoo("CNF", "BSB", 2);
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            Console.WriteLine();
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(); }
            //imprime o comando
            mensagem = "imprimeTudo()";
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            //imprime o resultado do comando
            mensagem = objAero.imprimeTudo();
            imprimeMessage(mensagem);
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine(mensagem); }

            Console.WriteLine("==========================RESULTADOS========================");
            Console.WriteLine();
            using (StreamWriter sw = File.AppendText(strPathFile))
            { sw.WriteLine("==========================RESULTADOS========================"); }
        }
        public void cadastrarAeroportosTeste()
        {
            //cadastra os aeroportos
            Aeroporto obj = new Aeroporto();
            string message = null;

            Console.WriteLine("=================REALIZAÇÂO DE CADASTROS===================");
            message += obj.cadastraAeroporto("Brasilia");
            message += "\n" + obj.cadastraAeroporto("Belo Horizonte");
            message += "\n" + obj.cadastraAeroporto("Rio de Janeiro");
            message += "\n" + obj.cadastraAeroporto("São Paulo");
            message += "\n" + obj.cadastraAeroporto("Salvador");
            imprimeMessage(message);

            using (StreamWriter sw = File.AppendText(strPathFile))
            {
                sw.WriteLine("=================REALIZAÇÂO DE CADASTROS===================");
                sw.WriteLine();
                sw.WriteLine(message);
            }

            message = null;
        }
        public void cadastrarVoosTeste()
        {
            //cadastra todos os voos
            string message = null;

            //cadastra voos em brasilia
            message += "\n" + objVoo.cadastraVoo(107, 0, 4);
            //cadastra voos em belo horizonte
            message += "\n" + objVoo.cadastraVoo(214, 1, 4);
            message += "\n" + objVoo.cadastraVoo(555, 1, 2);
            message += "\n" + objVoo.cadastraVoo(101, 1, 3);
            //cadastra voos em rio de janeiro
            message += "\n" + objVoo.cadastraVoo(554, 2, 1);
            message += "\n" + objVoo.cadastraVoo(090, 2, 3);
            //cadastra voos em sao paulo
            message += "\n" + objVoo.cadastraVoo(050, 3, 0);
            message += "\n" + objVoo.cadastraVoo(089, 3, 2);
            message += "\n" + objVoo.cadastraVoo(102, 3, 1);
            //cadastra voos em salvado
            message += "\n" + objVoo.cadastraVoo(215, 4, 1);
            //fim do cadastra todos os voos

            imprimeMessage(message);
            imprimeMessage("=================FINALIZAÇÂO DE CADASTROS===================");
            imprimeMessage("");

            using (StreamWriter sw = File.AppendText(strPathFile))
            {
                sw.WriteLine(message);
                sw.WriteLine("=================FINALIZAÇÂO DE CADASTROS===================");
                sw.WriteLine();
            }//fim using
            message = null;
        }
        //fim dos métodos de teste

        /*Opção do menu--> 0*/
        public void finalizarProgram()
        {
            int j = 100 * 100 * 100 * 100;
            for (int i = 0; i < 6 * j; i++)
            {
                if (i == 0)
                {
                    Console.ForegroundColor = ConsoleColor.Red;
                    Console.WriteLine("\tO programa será finalizado automaticamente");
                }
            }
        }
        //fim das opções do menu

    }
}
