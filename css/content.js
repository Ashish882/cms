document.addEventListener('DOMContentLoaded', function () {
  const defaultNav = {
    "about": {
      text: 'About',
      href: "https://hackernoon.com/about",
      sections: [
        {
          heading: {
            text: "Get Help",
            href: "http://help.hackernoon.com"
          },
          links: [
            {
              text: "Account Creation Troubleshooting",
              href: "https://help.hackernoon.com/app/page/1fWmAG6zSc-EuxBhHYt-tUIR0wfefRxkmpVRD46byKTw"
            },
            {
              text: "Connect Medium to Hackernoon",
              href: "https://t.sidekickopen80.com/s1t/c/5/f18dQhb0S7lM8dDMPbW2n0x6l2B9nMJN7t5XWPdSD1CVRs8Z42z8PNzTzGpw63MNl0103?t=https%3A%2F%2Fhelp.hackernoon.com%2Fapp%2Fpage%2F1lDCt9BDTNOQDV7XsOchDBXsmnicvdwa8hw5EFopkDS4&si=8000000000817720&pi=4757d00e-256a-4699-bab5-e8d69432546a"
            },
            {
              text: "Create Your Own CTA",
              href: "https://help.hackernoon.com/app/page/1lDCt9BDTNOQDV7XsOchDBXsmnicvdwa8hw5EFopkDS4"
            },
            {
              text: "Medium Transition FAQ",
              href: "https://help.hackernoon.com/app/page/1uNH9LJ9-2lFUukcceNjYeguF3QgT4RZhhMP0XZFktpk"
            }
          ]
        },
        {
          heading: {
            text: "Start Writing",
            href: "http://contribute.hackernoon.com"
          },
          links: [
            {
              text: "Complete Writing Guide",
              href: "https://t.sidekickopen80.com/s1t/c/5/f18dQhb0S7lM8dDMPbW2n0x6l2B9nMJN7t5XWPdSD1CVRs8Z42z8PNzTzGpw63MNl0103?t=https%3A%2F%2Fhelp.hackernoon.com%2Fapp%2Fpage%2F1lDCt9BDTNOQDV7XsOchDBXsmnicvdwa8hw5EFopkDS4&si=8000000000817720&pi=4757d00e-256a-4699-bab5-e8d69432546a"
            },
            {
              text: "Submit a Story",
              href: "https://t.sidekickopen80.com/s1t/c/5/f18dQhb0S7lM8dDMPbW2n0x6l2B9nMJN7t5XWPdSD1CVRs8Z42z8PNzTzGpw63MNl0103?t=https%3A%2F%2Fhelp.hackernoon.com%2Fapp%2Fpage%2F1lDCt9BDTNOQDV7XsOchDBXsmnicvdwa8hw5EFopkDS4&si=8000000000817720&pi=4757d00e-256a-4699-bab5-e8d69432546a"
            },
            {
              text: "Write Better Headlines",
              href: "https://t.sidekickopen80.com/s1t/c/5/f18dQhb0S7lM8dDMPbW2n0x6l2B9nMJN7t5XWPdSD1CVRs8Z42z8PNzTzGpw63MNl0103?t=https%3A%2F%2Fhelp.hackernoon.com%2Fapp%2Fpage%2F1lDCt9BDTNOQDV7XsOchDBXsmnicvdwa8hw5EFopkDS4&si=8000000000817720&pi=4757d00e-256a-4699-bab5-e8d69432546a"
            }
          ]
        },
        {
          heading: {
            text: "Sponsors",
            href: "http://help.hackernoon.com"
          },
          links: [
            {
              text: "Brand As Author",
              href: "https://sponsor.hackernoon.com/#brandasauthor"
            },
            {
              text: "Sitewide Billboard",
              href: "https://sponsor.hackernoon.com/#billboard"
            }
          ]
        }
      ]
    },
    "podcast": {
      text: 'Podcast',
      href: 'https://podcast.hackernoon.com',
      sections: [
        {
          heading: {
            text: "Podcast",
            href: "https://podcast.hackernoon.com/"
          },
          links: [
            {
              text: "iTunes",
              href: "https://podcasts.apple.com/us/podcast/hacker-noon-podcast/id1436233955"
            },
            {
              text: "Google Play",
              href: "https://play.google.com/music/listen?u=0#/ps/Iy3btdr7spqcih5fheglsxdymie"
            },
            {
              text: "Youtube",
              href: "http://hackernoon.video"
            },
            {
              text: "Nominate a Guest",
              href: "https://hackernoonpodcast.paperform.co/"
            },
            {
              text: "Become a Sponsor",
              href: "https://sponsor.hackernoon.com/#podcast"
            },
            {
              text: "Discover More Tech Podcasts",
              href: "https://hackernoon.com/tagged/podcast"
            }
          ]
        }
      ]
    },
    "community": {
      text: 'Community',
      href: 'https://community.hackernoon.com',
      sections: [
        {
          heading: {
            text: "Browse by Category",
            href: "https://community.hackernoon.com/categories"
          },
          links: [
            {
              text: "Start a Discussion!",
              href: "https://community.hackernoon.com"
            },
            {
              text: "AMA",
              href: "https://community.hackernoon.com/c/ama"
            },
            {
              text: "Code Pong",
              href: "https://community.hackernoon.com/c/code-pong"
            },
            {
              text: "Crypto",
              href: "https://community.hackernoon.com/c/crypto"
            },
            {
              text: "Editorial",
              href: "https://community.hackernoon.com/c/editorial"
            },
            {
              text: "General",
              href: "https://community.hackernoon.com/c/general"
            },
            {
              text: "Product",
              href: "https://community.hackernoon.com/c/product"
            },
            {
              text: "Podcast",
              href: "https://community.hackernoon.com/c/podcast"
            },
            {
              text: "Random",
              href: "https://community.hackernoon.com/c/random"
            },
            {
              text: "Software Development",
              href: "https://community.hackernoon.com/c/Software-Development"
            },
            {
              text: "Technology",
              href: "https://community.hackernoon.com/c/technology"
            }
          ]
        },
        {
          heading: {
            text: "Top Discussions",
            href: "https://community.hackernoon.com/top"
          },
          links: [
            {
              text: "Daily",
              href: "https://community.hackernoon.com/top/daily"
            },
            {
              text: "Weekly",
              href: "https://community.hackernoon.com/top/weekly"
            },
            {
              text: "Monthly",
              href: "https://community.hackernoon.com/top/monthly"
            },
            {
              text: "Quarterly",
              href: "https://community.hackernoon.com/top/quarterly"
            },
            {
              text: "Yearly",
              href: "https://community.hackernoon.com/top/yearly"
            },
            {
              text: "All Time",
              href: "https://community.hackernoon.com/top/all"
            }
          ]
        }
      ]
    },
    "ai": {
      text: 'Artificial Intelligence',
      href: 'https://hackernoon.com/tagged/artificial-intelligence',
      sections: [
        {
          heading: {
            text: "Artificial Intelligence",
            href: "https://hackernoon.com/tagged/artificial-intelligence"
          },
          links: [
            {
              text: "Data Science",
              href: "https://hackernoon.com/tagged/data-science"
            },
            {
              text: "Deep Fakes",
              href: "https://hackernoon.com/tagged/deep-fakes"
            },
            {
              text: "Deep Learning",
              href: "https://hackernoon.com/tagged/deep-learning"
            },
            {
              text: "Machine Learning",
              href: "https://hackernoon.com/tagged/machine-learning"
            }
          ]
        }
      ]
    },
    "cryptocurrency": {
      text: 'Cryptocurrency',
      href: 'https://hackernoon.com/tagged/cryptocurrency',
      sections: [
        {
          heading: {
            text: "Coins",
            href: "#"
          },
          links: [
            {
              text: "Bitcoin",
              href: "https://hackernoon.com/tagged/bitcoin"
            },
            {
              text: "Ethereum",
              href: "https://hackernoon.com/tagged/ethereum"
            },
            {
              text: "Ripple",
              href: "https://hackernoon.com/tagged/ripple"
            },
            {
              text: "More",
              href: "https://hackernoon.com/tagged/cryptocurrency"
            }
          ]
        },
        {
          heading: {
            text: "Blockchain",
            href: "https://hackernoon.com/tagged/blockchain"
          },
          links: [
            {
              text: "Adoption",
              href: "https://hackernoon.com/tagged/blockchain-adoption"
            },
            {
              text: "Application",
              href: "https://hackernoon.com/tagged/blockchain-application"
            },
            {
              text: "Development",
              href: "https://hackernoon.com/tagged/blockchain-development"
            },
            {
              text: "Smart Contracts",
              href: "https://hackernoon.com/tagged/smart-contracts"
            },
            {
              text: "Technology",
              href: "https://hackernoon.com/tagged/blockchain-technology"
            }
          ]
        }
      ]
    },
    "coding": {
      text: 'Coding',
      href: 'https://hackernoon.com/tagged/coding',
      sections: [
        {
          heading: {
            text: "Engineering",
            href: "https://hackernoon.com/tagged/engineering"
          },
          links: [
            {
              text: "Architecture",
              href: "https://hackernoon.com/tagged/architecture"
            },
            {
              text: "Coding",
              href: "https://hackernoon.com/tagged/coding"
            },
            {
              text: "Programming",
              href: "https://hackernoon.com/tagged/programming"
            },
            {
              text: "Engineering Management",
              href: "https://hackernoon.com/tagged/engineering-management"
            },
            {
              text: "Software Development",
              href: "https://hackernoon.com/tagged/software-development"
            },
            {
              text: "Agile",
              href: "https://hackernoon.com/tagged/agile"
            },
            {
              text: "Scrum",
              href: "https://hackernoon.com/tagged/scrum"
            },
            {
              text: "Test Driven Development",
              href: "https://hackernoon.com/tagged/tdd"
            }
          ]
        },
        {
          heading: {
            text: "Languages",
            href: "https://hackernoon.com/tagged/languages"
          },
          links: [
            {
              text: "Javascript",
              href: "https://hackernoon.com/tagged/javascript"
            },
            {
              text: "NodeJS",
              href: "https://hackernoon.com/tagged/nodejs"
            },
            {
              text: "Python",
              href: "https://hackernoon.com/tagged/python"
            },
            {
              text: "React",
              href: "https://hackernoon.com/tagged/react"
            },
            {
              text: "Vim",
              href: "https://hackernoon.com/tagged/vim"
            }
          ]
        },
        {
          heading: {
            text: "Security",
            href: "https://hackernoon.com/tagged/security"
          },
          links: [
            {
              text: "Cybersecurity",
              href: "https://hackernoon.com/tagged/cybersecurity"
            },
            {
              text: "Encryption",
              href: "https://hackernoon.com/tagged/encryption"
            },
            {
              text: "Info Sec",
              href: "https://hackernoon.com/tagged/infosec"
            },
            {
              text: "Privacy",
              href: "https://hackernoon.com/tagged/privacy"
            }
          ]
        }
      ]
    },
    "futurism": {
      text: 'Futurism',
      href: 'https://hackernoon.com/tagged/futurism',
      sections: [
        {
          heading: {
            text: "Effect of Tech",
            href: "https://hackernoon.com/tagged/technology-trends"
          },
          links: [
            {
              text: "Automation",
              href: "https://hackernoon.com/tagged/automation"
            },
            {
              text: "Big Data",
              href: "https://hackernoon.com/tagged/big-data"
            },
            {
              text: "Economics",
              href: "http://hackernoon.com/tagged/economics"
            },
            {
              text: "Future",
              href: "https://hackernoon.com/tagged/future"
            },
            {
              text: "Robotics",
              href: "https://hackernoon.com/tagged/robotics"
            },
            {
              text: "Space",
              href: "https://hackernoon.com/tagged/space"
            }
          ]
        },
        {
          heading: {
            text: "Framing Realities",
            href: "https://www.startengine.com/hackernoon"
          },
          links: [
            {
              text: "Augmented Reality",
              href: "https://hackernoon.com/tagged/augmented-reality"
            },
            {
              text: "Mixed Reality",
              href: "https://hackernoon.com/tagged/mixed-reality"
            },
            {
              text: "Open Tech Letters",
              href: "https://hackernoon.com/open-letters/home"
            },
            {
              text: "Virtual Reality",
              href: "https://hackernoon.com/tagged/virtual-reality"
            },
            {
              text: "WTF",
              href: "https://hackernoon.com/tagged/wtf"
            }
          ]
        }
      ]
    },
    "startups": {
      text: 'Startups',
      href: 'https://hackernoon.com/tagged/startups',
      sections: [
        {
          heading: {
            text: "Startups Advice",
            href: "https://hackernoon.com/tagged/startup-advice"
          },
          links: [
            {
              text: "Entrepreneurship",
              href: "https://hackernoon.com/tagged/entrepreneurship"
            },
            {
              text: "Funding",
              href: "https://hackernoon.com/tagged/funding"
            },
            {
              text: "Marketing",
              href: "https://hackernoon.com/tagged/marketing"
            },
            {
              text: "Pitching",
              href: "https://hackernoon.com/tagged/pitching"
            },
            {
              text: "Scaling",
              href: "https://hackernoon.com/tagged/scaling"
            }
          ]
        },
        {
          heading: {
            text: "FAAGM",
            href: "https://hackernoon.com/tagged/faagm"
          },
          links: [
            {
              text: "Facebook",
              href: "https://hackernoon.com/tagged/facebook"
            },
            {
              text: "Amazon",
              href: "https://hackernoon.com/tagged/amazon"
            },
            {
              text: "Apple",
              href: "https://hackernoon.com/tagged/apple"
            },
            {
              text: "Google",
              href: "https://hackernoon.com/tagged/google"
            },
            {
              text: "Microsoft",
              href: "https://hackernoon.com/tagged/microsoft"
            }
          ]
        }
      ]
    }
  };

  const vm = new Vue({
    el: '#top',
    data() {
      return {
        activeNav: '',
        nav: defaultNav,
        ad: '',
        mobileMenuOpen: false
      };
    },
    async mounted() {
      try {
        const res = await fetch('/data.json');
        if (res.ok) {
          const json = await res.json();
          this.ad = json.ad;
          this.nav = json.nav;
          this.incrementSponsorshipDatum({ sponsorship: this.ad.id, field: 'impressions' });
        } else {
          throw res;
        }
      } catch (err) {
        console.error(err);
      }
    },
    beforeDestroy() {
      if (this.idTokenTimer) {
        clearInterval(this.idTokenTimer);
      }
    },
    methods: {
      openNav(nav) {
        this.activeNav = nav;
        clearTimeout(this.navBounce);
      },
      toggleMobileMenu() {
        this.mobileMenuOpen = !this.mobileMenuOpen;
      },
      navHover(category, ev) {
        if (!this.mobileMenuOpen) {
          category.sponsor ? this.closeNav() : this.openNav(category.name);
        }
      },
      navClick(category, ev) {
        if (category.sponsor) {
          this.recordAdClick();
        } else {
          if (this.mobileMenuOpen) {
            console.log('clicked', ev);
            ev.stopPropagation();
            ev.preventDefault();
            this.openNav(category.name);
          }
        }
      },
      closeNav() {
        this.navBounce = setTimeout(() => {
          this.activeNav = '';
        }, 400);
      },
      closeNavReset() {
        clearTimeout(this.navBounce);
      },
      recordAdClick(ev) {
        this.incrementSponsorshipDatum({ sponsorship: this.ad.id, field: 'clicks' });
      },
      incrementSponsorshipDatum({ sponsorship, field }) {
        let data = {
          sponsorship,
          field
        };

        navigator.sendBeacon('https://api.hackernoon.com/analytics/ads/increment', JSON.stringify(data));
      }
    }
  })
});