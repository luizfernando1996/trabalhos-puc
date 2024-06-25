using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace TrabalhoGrafos.Controller
{
    class Vetor
    {
        public string nomeVertice;
        public Vertice primeiro;

        public Vetor(string nomeVertice, Vertice obj)
        {
            this.nomeVertice = nomeVertice;
            this.primeiro = obj;
        }

    }
}
