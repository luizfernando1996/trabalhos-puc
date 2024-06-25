using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Hash.MVC.Controller.Lista
{
    class Lista
    {
        public Node inicio;

        public bool listaVazia()
        {
            return inicio == null;
        }

        public void insereLista(string nome, string regiao, string capital, string qtdeMunicipios)
        {
            Node novo = new Node(nome, regiao, capital, qtdeMunicipios, null);

            if (listaVazia())
                inicio = novo;

            else
            {
                Node p = inicio;

                while(p.Next != null)
                {
                    p = p.Next;
                }

                p.Next = novo;                
            }
        }

        public void imprime()
        {
            Console.WriteLine("");
            Node p = inicio;

            while(p != null)
            {
                Console.Write( p.Next + " ");
            }
        }




    }
}
