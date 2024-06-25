using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace TrabalhoGrafos.Controller
{
    class Vertice
    {
        public string nomeVertice;
        public Vertice next;

        public Vertice(string nomeVertice) {
            this.nomeVertice = nomeVertice;
            this.next = null; 
        }
    }
}
