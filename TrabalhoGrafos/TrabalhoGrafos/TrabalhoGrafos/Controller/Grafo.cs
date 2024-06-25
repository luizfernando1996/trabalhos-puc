using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

//Alterar o arquivo de leitura
namespace TrabalhoGrafos.Controller
{
    class Grafo
    {
        #region "Atributos básicos"

        //Todos os objetos compartilharam o mesmo vetor,
        //logo existira 5 vértices e não apenas um
        public static Vetor[] vetor = new Vetor[5];

        #endregion

        #region "Operações Fundamentais p/ construção do grafo"

        //Lê do arquivo txt os grafos e joga na memoria ram...na memoria executavel deste programa
        public void lerArqTxT()
        {
            string leitura;
            string[] vertices;
            using (StreamReader ler = new StreamReader("D:/Luiz Fernando/Puc Minas/4°Periodo/Grafos/Trabalho Prático/PrimeiroTrabalho/TrabalhoGrafos/TrabalhoGrafos/Model/NaoDirigido/GrafosNaoDirigidos.txt"))
            {
                leitura = ler.ReadLine();
                while (leitura != null)
                {
                    leitura = ler.ReadLine();
                    vertices = leitura.Split(' ');
                    construirGrafo(vertices);
                }
            }
        }

        //Constroi o grafo não dirigido para cada linha do arquivo
        public void construirGrafo(string[] vertices)
        {
            string v1, v2;
            v1 = vertices[0];

            Vetor verticeOrigem;
            verticeOrigem = criarVertice(v1);
            int i = 1;
            while (vertices[i]!=null)
            {
                v2 = vertices[i];
                adicionarVertice(verticeOrigem, v2);
                i++;
            }
        }

        //cria o vertice sem nenhuma aresta e o retorna
        public Vetor criarVertice(string v1)
        {
            int i = 0;
            bool sair = false;
            //Pesquisa se já existe o vertice v1 
            while (sair == false)
            {
                //Vertice v1 já é existente
                if (vetor[i] != null && vetor[i].nomeVertice == v1)
                {
                    sair = true;
                }
                //vertice v1 é inexistente, logo ele é criado
                else if (vetor[i] == null && sair == false)
                {
                    vetor[i].nomeVertice = v1;
                    sair = true;
                }
                if (sair != true)
                    i++;
            }
            return vetor[i];
        }

        //adiciona o vertice na lista de adjacencia, compreendida pelo objeto V1
        public void adicionarVertice(Vetor objVetor, string v2)
        {
            //ponteiro para a repetição
            Vertice ponteiro = objVetor.primeiro;

            //cria o vertice que será adicionado
            Vertice vert = new Vertice(v2);

            //pesquisa p/ inserir no lugar correto
            while (ponteiro != null)
            {
                if (ponteiro.next == null)
                    ponteiro.next = vert;

                ponteiro = ponteiro.next;
            }
        }

        #endregion

        #region "Métodos de 1 a 6 p/grafo não dirigido"

        public bool isAdjacente(Vertice V1, Vertice V2) { return true; }

        public int getGrau(Vertice V1) { return 2; }

        public bool isRegular(Grafo G) { return true; }

        public bool isIsolado(Vertice V1) { return true; }

        public bool isPendente(Vertice V1) { return true; }

        public bool isNulo(Grafo G) { return true; }

        #endregion


        #region "Métodos de 7 a 13 p/grafo não dirigido"

        public bool isCompleto(Grafo G) { return true; }

        public bool isConexo(Grafo G) { return true; }

        public bool isBipartido(Grafo G) { return true; }

        public Grafo getComplementar(Grafo G) { return G; }

        public bool isEuleriano(Grafo G) { return true; }

        public bool isUnicursal(Grafo G) { return true; }

        public bool isHamiltoniano(Grafo G) { return true; }

        #endregion

        #region "Métodos de 14 a 18 p/grafo dirigido"

        public bool hasCiclo(Grafo G) { return true; }

        public int getGrauEntrada(Vertice v1) { return 2; }

        public void ordenacaoTopologica(Grafo G) { } //verifique se o grafo é acíclico antes

        public Grafo getTransposto(Grafo G) { return G; }

        public bool isFConexo(Grafo G) { return true; }

        #endregion

        #region "Demais Métodos"

        #endregion
    }
}
