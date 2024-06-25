using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Hash.MVC.Controller.Lista;

namespace Hash.MVC.Controller.TabelaHash
{
    class TabelaHash
    {
        public int tamanho;
        public string tipoDeTratamento;
        public int colisoes = 0;
        public Node[] tabela; 



        public TabelaHash(int tamanho, string tipoDeTratamento)
        {
            this.tamanho = tamanho;
            this.tipoDeTratamento = tipoDeTratamento;
            tabela = new Node[tamanho];
        }

        public void insereHash(Node obj)
        {
            if (tipoDeTratamento == "1")
            {
                insereAberto(obj);
            }
            else
            {
                insereLista(obj);
            }
        }

        #region "Insere Na Lista"
        public void insereLista(Node obj)
        { 
            int j = 0;
            posicao = FuncaoHash.EncontraPosicao(obj.NomeEstado, tamanho);
            bool inserido = false;

            while(j < tabela.Length && inserido != true)
            {
                if (j == posicao)
                {                    
                    if (tabela[j] == null)
                    {
                        tabela[j] = obj;
                        inserido = true;
                    }
                    else
                    {
                        Node p = tabela[j];
                        colisoes++;
                        while (p.Next != null)
                        {
                            p = p.Next;
                        }

                        p.Next = obj;
                    }
                }
                j++;
            }
        }


        #endregion
        int posicao;

        #region inserção aberta
        private void insereAberto(Node obj)
        {
            if(obj != null)            
             posicao = FuncaoHash.EncontraPosicao(obj.NomeEstado, tamanho);
            int inicial = posicao;

            int i = 0;
            bool inserido = false;

            while (i < tabela.Length && inserido != true)
            {
                if (i == posicao)
                {
                    if (tabela[i] == null)
                    {
                        tabela[i] = obj;
                        inserido = true;
                    }
                    else
                    {
                        colisoes++;
                        posicao++;
                    }
                }
                i++;
            }

            if (inserido == false)
            {
                i = 0;
                posicao = 0;

                while (i < inicial && inserido != true)
                {
                    if (i == posicao)
                    {
                        if (tabela[i] == null)
                        {
                            tabela[i] = obj;
                            inserido = true;
                        }
                        else
                        {
                            colisoes++;
                            posicao++;
                        }
                    }
                    i++;
                }

                if (inserido == false)
                {
                    Console.WriteLine("Não há espaço para inserir todos os estados escolha um tamanho de hash maior!");                    
                }
                    
            }

        }
        #endregion;

        #region 'Imprime"
        public void imprime(string estado)
        {
            bool imprimiu = false;

            for (int j = 0; j < tabela.Length; j++)
            {
                if (tabela[j] == null) { }

                else
                {
                    if (tabela[j].NomeEstado == estado)
                    {
                        imprimiu = true;
                        Console.WriteLine(estado);
                        Console.WriteLine("Região: " + tabela[j].RegiaoDoEstado);
                        Console.WriteLine("Capital: " + tabela[j].CapitalEstado);
                        Console.WriteLine("Quantidade de Municípios: " + tabela[j].QuantMunicipios);
                    }
                    else
                    {
                        if (tabela[j].Next != null)
                        {
                            while (tabela[j].Next != null && tabela[j].Next.NomeEstado != estado)
                            {
                                tabela[j] = tabela[j].Next;
                            }
                            if (tabela[j].Next != null)//tabela[j].Next.NomeEstado == estado
                            {
                                imprimiu = true;
                                Console.WriteLine(estado);
                                Console.WriteLine("Região: " + tabela[j].RegiaoDoEstado);
                                Console.WriteLine("Capital: " + tabela[j].CapitalEstado);
                                Console.WriteLine("Quantidade de Municípios: " + tabela[j].QuantMunicipios);
                            }
                        }
                    }
                }
               
            }
            if (imprimiu == false)
                Console.WriteLine("Estado não encontrado na tabela");           

        }
        #endregion


    }
}
