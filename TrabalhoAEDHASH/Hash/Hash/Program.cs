using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Hash.MVC.DAL.LeituraArq;
using Hash.MVC.Controller.TabelaHash;

namespace Hash
{
    class Program
    {

        static void Main(string[] args)
        {

            int tamanho = recebeTamanhoDaEntrada();
            RecebeEstruturaDeDados(tamanho);
            Console.ReadKey();

            Leitura objLer = new Leitura();
            
            Console.ReadKey();

        }

        public static int recebeTamanhoDaEntrada()
        {
            string tamanho;
            int tamanhoHash = 2;
            bool sair = false;
            while (sair.Equals(false))
            {
                Console.WriteLine("Informe o tamanho da tabela hash");
                tamanho = Console.ReadLine();
                bool tamanhoTabelaExiste = int.TryParse(tamanho, out tamanhoHash);

                if (tamanhoTabelaExiste)
                {
                    sair = true;
                }
                else
                    Console.WriteLine("\nDigite numero inteiro para o tamanho da tabela por favor");
            }
            return tamanhoHash;
        }
        public static int RecebeEstruturaDeDados(int tamanho)
        {
            string opcaoSelecionada;
            int opcaoListaEncadeada = 1;
            bool sair = false;
            while (sair.Equals(false))
            {
               
                Console.WriteLine("Digite 1 para selecionar a estrutura de dados de endereçamento aberto");
                Console.WriteLine("Digite 2 para selecionar a estrutura de dados de listas encadeada");
                opcaoSelecionada = Console.ReadLine();

                bool numeroInteiro = int.TryParse(opcaoSelecionada, out opcaoListaEncadeada);
                if (numeroInteiro)
                {
                    sair = true;
                    if (opcaoListaEncadeada == 1)
                    {
                        TabelaHash tabela = new TabelaHash(tamanho, "1");
                        Leitura let = new Leitura();

                        for (int i = 0; i < 26; i++)
                        {
                            tabela.insereHash(let.vetorEstados[i]);
                        }

                        Console.WriteLine("Quantidade de colisões = " + tabela.colisoes);
                        string opcaoEstado =;//chama o metodo do menu de o~ções de estado
                        tabela.imprime(opcaoEstado);
                    }
                    else if (opcaoListaEncadeada == 2)
                    {
                        TabelaHash tabela = new TabelaHash(tamanho, "2");
                        Leitura let = new Leitura();

                        for (int i = 0; i < 26; i++ )
                        {
                            tabela.insereHash(let.vetorEstados[i]);
                        }                       
                       
                        Console.WriteLine("Quantidade de colisões = " + tabela.colisoes);
                        string opcaoEstado =;//chama o metodo do menu de o~ções de estado
                        tabela.imprime(opcaoEstado);


                    }
                }
                else
                    Console.WriteLine("\nDigite numero inteiros para selecionar a estrutura de dados por favor");
            }
            return opcaoListaEncadeada;

        }
    }
}
